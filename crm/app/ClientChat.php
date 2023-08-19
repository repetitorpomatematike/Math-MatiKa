<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ClientChat extends Model
{
    public $fillable = ['message'];
    public $table = 'client_chat';

    public function client()
    {
        return $this->hasOne('App\CrmClient', 'id', 'client_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function save(array $options = [])
    {
        $this->user_id = Auth::user()->id;
        if ($msg = $this->message) {
            $first = substr($msg, 0, 1);
            if ($first == '@') {
                $nick = explode(' ', $msg);
                $nick = str_replace('@', '', $nick[0]);
                /** @var User $find */
                $find = User::where('nick', $nick)->first();

                $linkProfile = route('ProfilePage', $nick);
                $this->message = str_replace("@" . $nick, "<a target='_blank' href='{$linkProfile}'>@{$nick}</a>", $this->message);

                if ($find) {
                    $client = $this->client()->get()->first();
                    $this->sendEmail($msg, $find, $client);
                    $link = route('CrmPage', $client->id);
                    $find->sendTelegram("Вас упомянули в чате клиента *«{$client->name}»* \n {$link}");
                }
            } else {
                /** @var CrmClient $client */
                $client = $this->client()->get()->first();
                /** @var User $user */
                $user = $client->getChargeable()->first();
                if ($user) {
                    $link = route('CrmPage', $client->id);
                    $user->sendTelegram("У вас в чате клиента за которого вы ответственны *«{$client->name}»* идет движняк, советую проверить \n {$link}");
                }
            }
        }
        return parent::save($options);
    }

    public function sendEmail($msg, User $user, CrmClient $client)
    {
        $to = $user->email;
        Mail::send('emails.chatnotify', ['msg' => $msg, 'user' => $user, 'client' => $client], function ($msg) use ($to) {
            $msg->to($to)->subject('Вас упомянули!');
        });
    }
}
