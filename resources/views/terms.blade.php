@extends('layouts.app')

@section('content')
    <div class="px-2 lg:px-14 py-4 text-lg" :class="{'text-gray-800': !dark, 'text-gray-100': dark}">

        <h1 class="text-3xl font-semibold">Terms of Service</h1>
        <p class="text-xl font-medium py-2">Welcome to Hikel and Thank you for using our products and services</p>
        <p>In these terms of service, your service provider is Hikel LLC (referred to as “Hikel”, “we”, “Us”, or “our”) a company founded in United States and the service consumer is you, our customer (“You” or “Your”). This Agreement governs websites, launched hikel dependant sites, EK services, apps, Hikel’s Got talent (HGT) and Ads of you using those listed services
        
        <p class="text-xl font-medium py-2">Our Services</p>

        The services we allow you to use are:</p>
        <ol class="list-decimal lg:px-8 px-4 py-3">
            <li>Launch your own video streaming site that you have the right to sell your own videos, E-books and podcasts on your own site          </li>
            <li>Upload, view and share videos and other related contents</li>
            <li>Enroll to compete on Hikel’s Got talent worldwide, vote or give golden buzzer to Hikel’s got talent competitors</li>
            <li>an EK services that you have the right to sell our services, or re use other third party contents on your behalf</li>
            <li>Receive company and individual ads to reach them out to more targeted audiences (is one of EK services)</li>
            <li>Referral links that you can share to others</li>
            <li>All other related services that we may provide</li>
        </ol>
        
        <p>ON the above services (our services) we provide for you, you have the right to upload and use contents like videos, images, audio, brandings, texts and other related contents provided by hikel or other third parties that you must not violate the content policy and laws</p> 
        <p class="text-xl font-medium py-2">Content policy</p>
        <p>The content policy is the rules and laws you must obey while using our services. This includes the restrictions of contents you may not upload or submit.</p>
        <ul class="list-disc lg:px-8 px-4 py-3">
            <li>Dangerous contents to make someone encourage self harm, create explosives, suicide, murder, hacking, bypassing payment information( from websites, apps, banks etc), hard drug use, eating disorders etc. </li>
            <li>sex direct or promotes a sexual contents</li>
            <li>Hate speech supportive contents like hatred or violence based on religion, Race, ethnicity, Gender, Age Disability etc</li>
            <li>Break privacy, trademark, copyright and any other third party rights.</li>
            <li>Violent contents including immolations, fights, sexual assaults and more</li>
            <li>Misinformed and False claimed contents towards drugs, medical, food, animals and all related terms</li>
            <li>Contents which contains defamatory</li>
            <li>Contains false or misleading information about voting</li>
            <li>Terror and /or hate group supportive</li>
            <li>Contents that encourage money trafficking , theft or fraudulent</li>
            <li>conspiracy-related contents explaining this world is not existed or related explanations</li>
            <li>contents containing acts that violates the rules and laws of the constitutions of united states of America government</li>
        </ul> 
        <p>We will change our services for the performance, security and improvement purpose. We may also need to down some of our services due to the high quality working assurance and we will notice every user including individuals and companies</p>
        <p class="text-xl font-medium py-2">Accounts and launched sites</p>
        <p class="py-1">You may create hikel free account and use some of service features like watching free videos, downloading free E-books and listing free audios. You can also these service features without having hikel’s free account.</p>
        <p class="py-1">In order to use features like uploading content, launching your own video streaming site, applying for Ek, sell your videos,  E-books and Podcasts, Enrolling for Hikel’s Got Talent and watching paid videos, you need to create Hikel’s paid account.</p> 
        <p class="py-1">For the protection your passwords and other sensitive data you may have on Hikel, you should keep your passwords safe and do not share those passwords to other third party persons or apps. You are responsible for all your account access.</p>
        <p class="text-xl font-medium py-2">Who may use our service?</p> 
        <p class="font-medium py-2">Age Requirement</p> 
        
        <p>Age is mandatory to use our services and features. In this case you must be at least 16 years old or greater or the applicable age of majority in your jurisdiction to create an account or use our Services. If you want to use the paid Services for a commercial purpose, you must be at least 18 years old. Individuals under the applicable age use our Services only through a parent or legal guardian’s account and with their involvement.</p>
        <p class="font-medium py-2">Parents and Guardians</p> 
        
        <p>You (parent or guardian) may grant your child permission to use the Services and features we deliver to our customers via your own hikel account. You agree and understand that you are responsible for monitoring and supervising your child's usage. If you believe your child is using your account and does not have your permission, please contact us immediately so that we can terminate their usage.</p>
        <p class="font-medium py-2">Restricted users</p> 

        <p>Please do not create a hikel account if you are:</p>
        <ul class="list-disc lg:px-8 px-4 py-3">
            <li>a member of some terrorist group</li>
            <li>support any illegal drug use or trade</li>
            <li>a resident of a country that may be in the united states of America government terrorist supporting country list or restricted parties</li>
        </ul>

        <p class="text-xl font-medium py-2">Your contents (Launch your site)</p>
        <p class="py-1">When you launch your own site, you have the right to sell your videos (movies, music, tutorials, fitness videos, etc), E-books and podcasts with fully integrated subscription and un subscription (one time purchase) payment options delivered to you by hikel. You can upload your contents of sell directly from your own launched site or from Hikel’s website. Your site will be the seller page every single customer of you can buy your services easily.</p>
        <p class="py-1">If you sell movies or music, or other digital content, you must be that content owner or a legal distributor. If you may try to sell these kinds of contents that may not be yours, we will close your services without giving you the money you make (if any). The Same policy will be applied for all the contents you provide.</p>
        <p class="py-1">You can also sell some of our services listed below directly from your own site to users on your behalf (EK service)</p>
        <ul class="list-disc lg:px-8 px-4 py-3">
            <li>promote their products or services</li>
            <li>apply for EK</li>
            <li>launch their own Site etc</li>
        </ul>
        <p class="py-1">While doing these services, you cannot upload contents that violets our content policy or give misinformation about our services to attract more users. If you do that, we will terminate your site and other related services without paying you the commission fee even if you get large amount of balance in your account.</p> 
        <p class="py-1">If you also see some of our clients sharing misinformation about our services to get more customers, you can report to us immediately.</p>
        <p class="text-xl font-medium py-2">Technical limitations and prohibitions of your contents</p>
        <p>While launching your own site to upload and sell your contents you may not do recreate, modify, alter disassemble, attempt to circumvent any of our security, submit any malicious programs, viruses, codes or any other dangerous request that may unreasonable or damage to our server.</p>
        <p class="text-xl font-medium py-2">Your ownership right</p>
        <p>As long as you are the owner your own site, you have the right to grant hikel and users to</p>
        <ul class="list-disc lg:px-8 px-4 py-3">
            <li>Watch, access, read and listen all your contents worldwide for free or with paid option.</li>
            <li>Embed your video with third party websites</li>
            <li>Download your video on their downloadable playlist </li>
            <li>Share your contents to others</li>
            <li>Rent or buy your contents </li>
            <li>Re use your contents on thier behalf (if you allow that option)</li>
            <li>Grant access to hikel to use your account profile name, logos, trademarks, links and other related features you have filled for the purpose of displaying your properties to the public or the audiences you have specified</li>
        </ul>
        
        <p class="text-xl font-medium py-2">Your re-use affiliate program</p>
        <p>As a content creator you have the right to sell your contents in your own site with your own marketing strategies. You can either promote your services to reach out more people or let others promote your services without you losing a budget for promotion. Through your affiliate re use program they will sell your contents for you on their behalf (on their own site) and then you pay them a 10% commission fee. This helps you reach out more people and facilitate your sales without struggling to get more customers. But you must not delete your contents until 2 months if you let them use your affiliate program or you must not modify the commission fee (10%). But If your content does violate the legal rules and privacy or other laws stated by the US government, we may remove your contents before two months and also you may not get your revenue even if you did sell to some users.</p>
        <p>In the other way if you are not a content creator and you are re using third party contents to generate revenue, you will get your commission (10%) revenue from every single sale you make for that third party. However the owner of that content has the full right to delete that content you are re using whenever they want (after two months)</p>
        <p class="text-xl font-medium py-2">Removal of your contents</p>
        <p class="py-1">Your contents may get removed by you, any other third party or by Hikel.</p>
        <p class="py-1"><b>Removal by you:</b> If you believe that content is no longer necessary for you to sell or entertain your targeted users, you have the right to remove the content at any time.</p>
        <p class="py-1"><b>Removal by Hikel or any third party:</b> If your contents violate our content policy or any law governing our site, or containing features that harm the clients, children, community etc, we (“Hikel” or “any third party”) may remove your contents.</p>
        
        <p class="text-xl font-medium py-2">Fee Options and plans</p>
        <p class="py-1">You make pay for the services we offer to you that you can make money via those services easily. For better quality of use and cheap pricing we offer both subscription and un subscription (one time purchase) fee plans. You choose one of our plans that fit best for your service you are selling. We currently don’t offer free services for any of our customers. We only have discounts, bonuses and referral link mechanisms for you to make money easily instead of giving you free trials.</p>
        <p class="py-1">Other third parties also have both subscription or un subscription plans for you to watch, listen, read and share videos, E-books, and Audio contents from their own generated videos streaming site they buy from Hikel.</p>
        <p class="py-1">If you want to be our third party customer and generate your own video streaming site to sell your contents, you can have both subscriptions and un subscription payment plans that works worldwide. You can also have the right to tag your own price to your services to sell. But you cannot modify, re create and re sell our selling plans.</p>
        
        <p class="text-xl font-medium py-2">Hikel Subscription plans</p>
        <p>In this plan we offer basic, standard and premium options for you to buy one of our services. They vary based on pricing, storage, money making options and others. See the details on our seller page and choose the best plan for you. </p>
        <p>We do not offer any enterprise or company plans. You (“individual”, “company”, “enterprise”) can choose whatever you want and use our service. Since our storage payment options are “Pay as you go”, you can use our service without any limitation. You choose the plans based on your budget, we do not limit any of your needs but you cannot sell, resell, rent, lease, or distribute any of these plans or any other aspect of our Services to any third party unless authorized by us in writing. We will terminate accounts sold via unauthorized resellers for non-payment to the reseller or any violation of the restrictions set forth in this Agreement.</p>
        <p class="text-xl font-medium py-2">Third party Subscription Plans</p>
        <p>You also may have subscription plans for purchasing, renting, viewing, listing or sharing movies, music, tutorials or other related videos, E-books and audios (includes music, podcasts or any other sound) from other third parties that have the right to distribute those contents and from those who already buy their own video streaming site from Hikel. </p> 
        <p class="text-xl font-medium py-2">Hikel Un subscription (one time purchase) Plans</p>
        <p>If you may want to enroll on Hikel’s Got talent, give golden buzzer to Hikels Got talent users, or any related service you may pay onetime fee to access those services.</p>
        <p class="text-xl font-medium py-2">Third party Un subscription (one time purchase) Plans</p>
        <p>If you want to watch third party movies, shows, music, tutorials, Podcasts and other related services or read E-books from third party content providers at once, you can avoid subscriptions fees and pay as you wish to watch or read. In this case, you cannot watch or read contents beside the contents you paid for.</p>
        <p class="text-xl font-medium py-2">Auto Renewal Subscriptions</p>
        <p>Subscriptions automatically renew at the end of each subscription period unless cancelled beforehand. Monthly plans renew for 30-day periods. Annual plans renew for one-year periods. You must pay the annual or monthly fee (plus any taxes) when each renewal period starts. You can cancel those subscription plans by changing their seller account status.</p> 
        
        <p class="text-xl font-medium py-2">EK</p>
        <p>With our EK service, you can sell our services on your behalf, re use other third party contents and you can also use our referral program to invite more people to Hikel’s Got Talent and get paid easily. </p>
        <p class="text-xl font-medium py-2">Applying for EK</p>
        <p>For applying EK you have to pay monthly subscription fee listed on the EK selling page (You can cancel anytime) and get your own referral link that helps you make more revenue easily. You start selling after you finish your subscription payment. </p>
        
        <p class="text-xl font-medium py-2">Termination of EK</p>
        <p>We may terminate your EK service if you:</p>
        <ul class="list-disc lg:px-8 px-4 py-3">
            <li>Share incorrect EK referral links to someone</li>
            <li>Give misinformation about EK services to attract more users</li>
            <li>Trying to sell our services that are not included on EK for sell. </li>
            <li>and re use third party contents that are not available for third party re use affiliate program</li>
        </ul>
        
        <p>If someone reports you are sharing misinformation’s about our Ek service,or relates actions listed on “Termination of EK”, we will terminate your Ek even if you make any amount of revenue before. If you also see someone try to share misinformation or bad service related to our EK service you can report to us immediately. </p>
        
        <p class="text-xl font-medium py-2">Referral Links</p>
        <p>You may generate and share referral links to Hikel’s got talent enrolling users in order to help us grow our customers and we will let you sell our services on the behalf of us and get paid without creating any content in return. But if you may share incorrect referral links other than you get from our website or if someone reports you are sharing un available links, we will terminate your Ek account even if you were generating money with it without giving you that revenue you may generate or we may terminate your whole account if you are ignoring our warning not to share un available referral links</p>
        <p class="text-xl font-medium py-2">Sending Your Money</p>
        <p>We will send your money you make using our services by the payment method you gave us via our website. The duration the money you receive may vary based on the payment method you chose to receive and the country you are living in but on the average you receive your money from 30th day of the current month to 15th day of the next month. We may charge you for the currency exchange rate (if you are living outside us), transaction fee and other storage and related service you are using as PAY AS YOU GO options.</p>
        <p>If there may be any delays receiving your money, please check your bank o any other account and get back to us. We will not be responsible for the delay after we send to your bank or any other payment processor you choose to receive.</p>
        <p class="text-xl font-medium py-2">Our use policy</p>	
        <p>We may allow you to upload, generate your own site, sell, submit, share or publish contents such as videos, E-books, podcasts and other audio sounds, images, and texts. You must ensure that your content complies with the content policy. We (“Hikel”) may (but is not obligated to) monitor your account, contents, or EK, regardless of your privacy settings. In this case Hikel may remove or limit access or availability to any content or account that violates this Use Policy</p>
        <p class="text-xl font-medium py-2">Copyright policy</p>
        <p>You, our honored customer have the right to upload and sell your own videos, E-books, podcasts and other contents from your generated site. However if other copyright owners report or requests to takedown your contents (or if you are uploading infringing materials), we may terminate your site, related services or account with the considerable circumstances</p> 
        <p class="text-xl font-medium py-2">Account Suspension and Termination</p>
        <p><b>Termination by You:</b>  you may terminate your site, Ek and other services or account whenever you want.</p>
        <p><b>Termination By Hikel:</b> Hikel may terminate your account if you:</p>
        <ul class="list-disc lg:px-8 px-4 py-3">
            <li>Violate the content policy</li>
            <li>Trying to sale illegal videos like movies, music and others that you don’t own</li>
            <li>Upload infringement materials repeatedly  </li>
            <li>we are required to comply with legal requirement or court order</li>
            <li>you use fake links contents or other related illegal actions that may harm the community, any user/company or Hikel services</li>
        </ul>
        
        <p>Hikel may terminate your account but you can use our service like viewing free and paid movies, music, tutorials and Hikel Got Talent videos. You may not use third party videos as yours and earn money.</p>
        
        <p class="text-xl font-medium py-2">Disclaimers</p>
        <p>EXCEPT EXPRESSLY STATED IN THIS AGREEMENT OR TO THE EXTENT PERMITTED  BY LAW, HIKEL PROVIDES ALL THE SERVICES ON “’AS IS” MODEL.HIKEL DOES NOT MAKE ANY SPECIFIC COMMITMENTS  OR WARRANTIES LIKE THE SPECIFIC FEATURES , THE AVAILABILITY,RELIABILITY, OR ANY OTHER CONTENTS ABOUT THE SERVICE.YOU USE THE SERVICES AT YOUR OWN RISK.</p>
        <p class="text-xl font-medium py-2">Limitation of Liability</p>
        <p>TO THE EXTENT PERMITTED BY APPLICABLE LAW, WE (“HIKEL,ITS AGENTS AND ALL EMPLOYEES) SHALL NOT BE LIABLE FOR FOR ANY INDIRECT,SPECIAL, INCIDENTAL OR EXEMPLARY DAMAGES INCLIDING DAMAGES FOR LOSS OF PROFITS, REVENUES, BUSINESS OPPORTUNITIES, GOODWILL, OR ANTICIPATED SAVINGS; LOSS OR CORRUPTION OF DATA; INDIRECT OR CONSEQUENTIAL LOSS THAT MAY CAUSE BY</p>
        <ul class="list-disc lg:px-8 px-4 py-3">
            <li>ERRORS, MISTAKES, OR INACCURACIES ON THE SERVICE</li>
            <li>REMOVAL OR UN ACCURACY OF ANY CONETNT </li>
            <li>ANY FRAUDANT</li>
            <li>ANY UNAUTHORIZED ACCESS TO OR USE OF THE SERVICE</li>
            <li>ANY INTERRUPTION  OF THE SERVICE</li>
            <li>ANY THIRD PARTY VIRUS OR MALICIOUS CODES TO ATTACK THE SERVICES OR SPECIAL FEATURES</li>
            <li>AND OR ANY PERSONAL INJURY OR PROPERTY DAMAGE AND ALL RELATED DAMAGES.</li>
        </ul>
 
        <p>THIS APPLIES TO ANY CLAIM BESIDES THE CLAIMS ARE BASED ON THE CONTRACT, WARRANTY OR OTHER LEGAL TEMRS. HIKEL TOTAL LIABILITY TO YOU FOR ANY CLAIMS ARISING FROM THE SERVICES THAT MAY SHALL NOT EXCEED THE AMOUNTS PAID TO YOU BY HIKEL OVET TWELVE (12) MONTHS OR ONE HUNDRED (100) DOLLARS.</p>
        <p class="text-xl font-medium py-2">About this agreement</p>
        
        <p>This agreement is made between you “user” and us(“hikel”). If your use service ends, this agreement will continue apply to you. But we may modify this Agreement for the better user experience to reflect changes to our Service or for legal, regulatory, or security reasons. Hikel will provide you a notice of any material modifications to this Agreement and the opportunity to review them. Modifications to this Agreement will only apply going forward. If you do not agree to the modified terms, you should remove any Content you have uploaded and discontinue your use of the Service.</p>
        <p class="text-xl font-medium py-2">Governing law</p>
        <p>All disputes arising of or relating to this agreement or your use service will be governed by Wyoming state law and the United States of America. You and Hikel will be governed by these laws without regard to principles of conflicts of law</p>
        <p class="text-xl font-medium py-2">Limitation on Legal Action</p>
        <p>TO THIS TEMRS YOU AND HIKEL AGREED, YOU AND HIKEL AGREE THAT ANY CAUSE OF ACTION ARISING OUT OF OR RELATED TO THE SERVICES MUST COMMENCE WITHIN ONE (1) YEAR AFTER THE CAUSE OF ACTION ACCRUES. OTHERWISE, SUCH CAUSE OF ACTION IS PERMANENTLY BARRED.</p>
        
        <p class="text-xl font-medium py-2">Last updated: 10th, November 2021</p>
    </div>
          
@endsection