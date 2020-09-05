<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $inquiry;

    public function __construct($inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('kkyopa@gmail.com') // 送信元
        ->subject('お問い合わせありがとうございます') // メールタイトル
        ->view('contact.inquiry_mail') // どのテンプレートを呼び出すか
        ->with(['inquiry' => $this->inquiry]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }
}
