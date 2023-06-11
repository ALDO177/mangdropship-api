<?php

namespace App\Trait\Table {

    use App\Jobs\JobEmailMangAdmin;
    use App\Models\Admin\AdminMangdropship;
    use App\Models\MangSellerModels\MangSellers;
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
                $model->end_at   = static::SettingDated('now +1 minutes');
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

        public static function DuplicatedResetPassword(string $email, string $status): bool
        {
            $duplicated = static::where('email', $email)
                          ->where('type', 'reset')
                          ->where('status', $status)
                          ->first();

            if (!is_null($duplicated)) {
                static::where('email', $email)->update(
                    ['token'    => md5(random_bytes(16)), 
                     'start_at' => static::SettingDated('now'),
                     'end_at'   => static::SettingDated('now +120 minutes')]
                );
                dispatch(new JobEmailMangAdmin($duplicated));
                return true;
            }
            return false;
        }
                
        public static function CreateResetPassword(string $type, string $email, string $status): bool
        {
            switch($status){
                case 'admins':
                    $users = AdminMangdropship::findWithEmail($email);
                    return static::ModelControlAuth($users, $type, $email, $status);
                    break;

                case 'mangseller':
                    $users = MangSellers::findWithEmail($email);
                    return static::ModelControlAuth($users, $type, $email, $status);
                    break;
                default:
                    return false;
                    break;
            }
        }

        protected static function ModelControlAuth(Model $models, string $type, string $email, string $status) : bool{

            $created = static::create(
                ['type'     => $type, 'email'        => $email, 
                'id_verify' => $models->id, 'status' => $status]
            );
            if($created) return true; return false;
        }
    }
}
