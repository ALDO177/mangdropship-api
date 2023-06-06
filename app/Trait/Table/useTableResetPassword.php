<?php

namespace App\Trait\Table {

    use App\Models\Seller\SelersHistoryAuth;
    use App\Models\User;
    use DateTime;
    use Illuminate\Database\Eloquent\Model;
    use Ramsey\Uuid\Uuid;
    const message_activation_created = "User Aktivasi Melakukan Reset Password";

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
            static::created(function (Model $model) {
                $model->makeHidden(['uuid']);
                SelersHistoryAuth::create([
                    'type'          => $model->type,
                    'data'          => $model->toArray(),
                    'user_id'       => $model->id_verify,
                    'info_messages' => message_activation_created,
                ]);
            });
        }

        protected static function SettingDated(string $options = 'now')
        {
            $createdAt = new DateTime($options);
            return $createdAt->format('Y-m-d H:i:s');
        }

        public static function findUuid(string $uuid){
            return static::where('uuid', $uuid)->first();
        }

        public static function DuplicatedResetPassword(string $email): bool
        {
            $duplicated = static::where('email', $email)->where('type', 'reset')->first();
            if (!is_null($duplicated)) {
                static::where('email', $email)->update(
                    ['token'   => md5(random_bytes(16)), 
                    'start_at' => static::SettingDated('now'),
                    'end_at'   => static::SettingDated('now +120 minutes')]
                );
                return true;
            }
            return false;
        }
                
        public static function CreateResetPassword(string $type, string $email): bool
        {
            $emailAuth  = User::findEmail($email);
            if ($emailAuth) {
                $created = static::create(['type' => $type, 'email' => $email, 'id_verify' => $emailAuth->id]);
                if ($created) return true;
            }
            return false;
        }
    }
}
