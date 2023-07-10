<?php

namespace App\VerifyTokens;

use App\Models\TokensVerify;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Subscribtion;
use App\Models\RoleSubscribtion;

class VerifyTokensEmail{

    protected string $tokens;

    public function __construct(User $users)
    {
        $this->tokens = Str::upper(Str::random(25));
        $this->start($users);
    }

    protected function start(User $users){
       $tokensVerify = new TokensVerify;
       $tokensVerify->tokens_type     = $this->tokens;
       $tokensVerify->tokens_id       = $users->id;
       $tokensVerify->id_tokens_users = $users->id;
       $tokensVerify->create_at       = (new DateTime('now'))->format('Y-m-d H:i:s');
       $tokensVerify->expired_at      = $this->expiredTokens();
       
       if($tokensVerify->save()){
            if(RoleSubscribtion::checkRoleType('AF')){
                Subscribtion::create([
                    'subscription_role_id' => RoleSubscribtion::where('role_type', 'AF')->first()->id,
                    'id_role_subs'         => $users->id,
                ]);
            }
       }
    }

    public function generateTokens() : string{
        return $this->tokens;
    }

    private function expiredTokens() : string{
        $dated = new DateTime('now +2 minutes');
        return $dated->format('Y-m-d H:i:s');
    }

    public static function updateTokensVerify(Request $request): bool{
        $updatedTokens = TokensVerify::where('tokens_type', $request->tokens)->first();
        $users =  $updatedTokens->userAccount;
        $users->tokens_verified = now()->format('Y-m-d H:i:s');
        return $users->save();
    }
}