<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use \App\Models\Support;

class SupportSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {     DB::table('supports')->insert(array(
    array('header'=>'Launch', 'question'=> 'How can I launch my website?', 'answer'=> 'You can simply go to hikell.com homepage then on the nav bar and click “launch your site”. Then choose your best payment plan and generate it.',
    ),
        
    array('header'=>'Launch', 'question'=>'Can i sell videos worldwide? ','answer'=> 'You sell your video contents like music, movies, TV shows, standup comedy, tutorials etc worldwide. There may be a few counties that does we do not support for accessing payments.',
    ),
    array('header'=>'launch', 'question'=>'Do I have to worry about storage, Security, domain names,SEO, and other hosting issues after I launch my website?','answer'=> 'No, definitely not. We handle everything that for you. Your storage is limitless (pay as you go), your bandwidth is unlimited, and we secure your website with great subscription tools beside SSL, we give you free site name instead of paid domain name so your customers can access it easily. ',

    ),
    array('header'=>'launch','question'=> 'How can I sell eBooks and Podcasts on my website?','answer'=> 'If you buy hikel standard subscription plan you have the right to sell your eBooks beside your video contents and if you buy premium subscription plan you can sell your eBooks and podcasts in addition to your video contents. We do not allow Basic users to sell any of their eBooks or podcasts. ',

    ),
    array('header'=>'launch','question'=> 'How hikell.com help me to sell my contents fast?','answer'=> 'After you create your site from hikell.com, your contents will be sold and watched on both your site and hikell.com website. This helps you to get more customers in a very period of time and reduce promotion cost to reach global customers.',

    ),
    array('header'=>'launch','question'=> 'Can I set my own price to my contents?','answer'=> 'Yes you can. You can add subscription, buy and rental selling options on your contents to help your customers choose which of your selling plan best fits for their need. You add those prices simply when you upload your contents.',

    ),
    array('header'=>'launch','question'=> 'What if my contents are not good as I expected and how can I generate money from my site?','answer'=> 'Your contents will be the key to generate your income. But if your contents do not worth it, you can sell hikell.com services on your behalf or you can just re use other third party contents and get 10% commission.',

    ),
    array('header'=>'launch', 'question'=>'How can customize my website?','answer'=> 'You can easily customize/edit your site name, logo, background images, and texts on anytime you want. But if you want to specialize your website like every feature, you need to contact us and we will do that for you.',

    ),
    array('header'=>'launch','question'=> 'Link my social Medias to my website?','answer'=> 'You are free to link your social Medias to facilitate your marketing.',

    ),
    array('header'=>'launch','question'=> 'Can I have my own privacy policy and legal terms to my website?','answer'=> 'Currently, you cannot offer you that kind of access for good reasons. Our privacy and legal terms will govern you and your customers. But there may be future changes to improve a better quality of services.',

    ),
    array('header'=>'reuse','question'=> 'What is a re use affiliate program?','answer'=> 'Re use affiliate program is a program created for users to re use third party contents and helps them to generate revenue without creating a single content. If you don’t have enough money to create contents like movies, TV shows, music, tutorials etc, or if you do not have a job at all, you can re use other third party contents and generate commission revenue easily. When you re use those third party contents, they will be displayed on your generated website (you can buy and launch your site from hikell.com) so people can buy those contents easily and you can earn a lot commission money from it. ',

    ),
    array('header'=>'reuse','question'=> 'Can I re use other third party contents legally without a copyright strike?','answer'=> 'Yes you can with accepting their affiliate program. You know re using other people contents without having a license to be a legal distributor is even unthinkable. You cannot do that with any',

    ),
    array('header'=>'reuse','question'=> 'Can I edit, Update or delete the contents I re-used?','answer'=> 'No, you may not. The contents you re-used will be displayed in your site are available only for sale not for other tasks. You cannot edit, modify, update and delete them but you can share to people through your social media. ',

    ),
    array('header'=>'reuse','question'=> 'For how long can I re-use third party contents?','answer'=> 'You can re use contents for at least two months. You may re use contents for more than two months if the owner (creator) of the content do not delete the content or disable their re use affiliate program. But if owned deletes the content even if other people re uses it, the content will be removed from all sites including the sites that re uses the content.  However, the owner of the content cannot delete the content before two months if he/she granted the content for re use. ',

    ),
    array('header'=>'reuse','question'=> 'Can I re use third party contents even if I am a creator and vice versa?','answer'=> 'Yes you can. You may re-use third party contents if your contents are not worth to sell or if you need more money without creating contents. But still, creating contents is the greatest way to earn more money because people will also help you to sell your contents worldwide. You should re use other people contents if you do not have enough money to create contents, or you don’t have a job at all. You can also allow users to re use your contents so they can sell your contents on their site and help you get more buyers worldwide and lower your promotion cost. Boom everyone wins here.',

    ),
    array('header'=> 'hikel', 'question'=>'What is Hikel Got Talent?', 'answer'=> 'It is a service that helps talented worldwide users to share their talent like singing, dancing, comedy, imitating, drama etc and get paid more than 10,000$ for each computation plus 250$ when they get 1k golden buzzer hits without leaving their sweet home, losing hotel, traveling& other related costs, facing scary judges eye or without being a citizen of such country.',

    ),
    array('header'=>'hikel','question'=> 'How can enroll on Hikels Got Talent?','answer'=> 'You simply go to hikell.com home page and click “Enroll now” button. After you done some steps, you simply upload your record on HGT and it will be displayed on HGT videos list that every people can vote you easily. You do not need to be live or go to some place to show your talents to the people, you simply record your talent from anywhere you want and upload it. But you cannot edit your voice, or use someone else’s talent as yours. If you do that, we may take down your video and you will be out of your computations.',

    ),
    array('header'=>'hikel','question'=> 'Is the reward for the winner fixed (10,000$) only?','answer'=> 'No, it is not fixed. The reward will be paid based on the number of competitors enroll on HGT worldwide. It requires at least 2,500 competitors to the winner get rewarded 10,000$. If the number of competitors enroll on HGT are more than 2500, the reward will get bigger and bigger. And if the number of worldwide competitors is less than 2500, the winner will get less than 10,000$.',

    ),
    array('header'=>'hikel', 'question'=>'What if I don’t win HGT, is there any chance I can make money from HGT?','answer'=> 'Yes definitely. Even if you do not win the show but have a good talent, people can hit the golden buzzers for you and you will get from your golden buzzers. For example if you get 1K golden buzzer hits, you will get paid 250$. We will add that money into your account whether you win the show or not.We also will give you a certificate that ensures your talent did worth to compete with others and have a good talent if you finish up to the final top 10 lists of each season.',

    ),
    array('header'=>'hikel','question'=> 'Can I enroll to HGT by myself and in Group too?','answer'=> 'Yes you can. You can compute by yourself and with some of your friends too in the same season. But you cannot compute with two of your personal accounts as an individual.',

    ),
    array('header'=>'hikel','question'=> 'Do I have to be a U.S citizen to enroll on HGT?','answer'=> 'No, you don’t. You can enroll to HGT from anywhere in the world.',

    ),
    array('header'=>'ek','question'=> 'What is EK?','answer'=> 'Ek is one of Hikel’s top services that every user can make money without creating any single content. If you do not have enough money to record videos to sell, talents to share to the world or if you do not have a job at all, Hikel’s Ek is the best place for you to help you sell hikell.com services on your behalf as well as other third party contents like movies, TV shows, music, tutorials etc on your site and you will get paid a great commission revenue ',

    ),
    array('header'=>'ek','question'=> 'What is EK referral and how can I make money with it?','answer'=> 'Ek referral is a program that helps you make money besides your reused contents and Hikell.com services commission revenue. You can get your EK referral after you apply for your EK or in your home dashboard. You simply copy and send it to at least 3 of your friends through your social Medias. It doesn’t matter whether they use your link or not, as long as they click it , it will count for you and if you are the top one to share your referral link  to the people than others, you will get paid up to 250$ each week. The 250$ reward will be varied based on the number of people apply for EK.',

    ),
   array('header'=>'ek','question'=> 'How much do I earn from the contents I reused from third parties?','answer'=> 'When you re use third party contents on your behalf, the contents like movies, TV shows, Music, tutorials etc will get displayed on your own website so people can simply subscribe, buy or rent those contents for the owner. When people do that for the owner, you will get paid 10% commission revenue without paying a single fee to the content owner to re use their contents.',

    ),
   array('header'=>'ek','question'=> 'How much do I earn from hikell.com services I sell from my website? ','answer'=> 'When you launch your own site, hikell.com services like “launch your site”, “apply for EK”, and “promote” will be displayed on your website menu bar. If someone then clicks those services and buy one of those from all or all of them from your menu bar, you get paid 9% (3% for each service) commission revenue without paying any storage and agent fee.',

   ),
   array('header'=>'payment','question'=> 'How can I make money through hikell.com?','answer'=> 'With hikell.com you can make money by selling your video contents like movies, music, TV shows, tutorials, or through your eBooks, podcasts, re used videos, EK, Hikels got talent and golden buzzers.',

   ),
   array('header'=>'payment','question'=> 'I am outside U.S; can I still sell my videos worldwide? ','answer'=> 'Yes you can. We support more than 146+ countries',

   ),
   array('header'=>'payment','question'=> 'How can I pay for my Hikel subscription, hikels got talent or other related payments?','answer'=> 'You can simply use your credit or debit cards, stripe, PayPal, or even your bank accounts without currency exchange rate (if your are outside U.S).For African countries we support all credit or debit card payments (if available) and local bank transfers via Flow cash',

   ),
   array('header'=>'payment','question'=> 'How can I receive my money I make from my sells?','answer'=> 'You will see your whole balance on your dashboard. Every sell or commission revenue will be displayed on your dashboard.   After you get enough revenue (25$ is the minimum balance required to withdraw), we will send your money to your bank, stripe, PayPal or Flow cash (for most African countries) account.',

   ),
   array('header'=>'payment','question'=> 'How many days does it take to get my money into my account?','answer'=> 'The number of days you will get your money will vary depend on the country you are living, the payment method you use. It usually takes from 1-7 days after you request your withdrawal.',

   ),
   array('header'=>'payment','question'=> 'Hikel does send me my money, but it is not arrived yet?','answer'=> 'If this kind of problem happens to you, you should check your bank or other account details you gave to hikell.com to make sure you deliver the right account. After you do that, you should ask your account holder if something happens there. ',

),
));}}