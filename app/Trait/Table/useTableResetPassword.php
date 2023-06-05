<?php

namespace App\Trait\Table {

    use App\Models\PasswordAuthentications;
    use App\Models\User;
    use DateTime;
    use Illuminate\Database\Eloquent\Model;
    use Ramsey\Uuid\Uuid;

    use function Illuminate\Events\queueable;

    trait useTableResetPassword
    {

        protected static function boot(): void
        {

            parent::boot();
            static::creating(function (Model $model) {
                $randomByte   = random_bytes(16);
                $model->token = md5($randomByte);
                $model->uuid  = Uuid::uuid4()->toString();
                $model->start_at = static::SettingDated('now');
                $model->end_at   = static::SettingDated('now +120 minutes');
            });
        }

        protected static function booted(): void
        {
            static::created(queueable(function (PasswordAuthentications $passwordAuth) {

            }));
        }

        protected static function SettingDated(string $options = 'now')
        {
            $createdAt = new DateTime($options);
            return $createdAt->format('Y-m-d H:i:s');
        }

        public static function CreateResetPassword(string $type, string $email): bool
        {
            $emailAuth   = User::findEmail($email);
            if ($emailAuth) {
                $created =  static::create(['type' => $type]);
                if ($created) return true; return false;
            }
            return false;
        }
    }
}
