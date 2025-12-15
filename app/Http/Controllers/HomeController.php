<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use App\Models\ReplyMessage;
use App\Models\Message;
use Illuminate\Support\Facades\Redirect;
use App\Models\Portfolio;
use App\Models\Slider;
use Illuminate\Support\Str;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::active()->ordered()->get();
        
        // Comprehensive SEO Meta Tags
        SEOMeta::setTitle('Interior Designer in Kenya | Office Fitouts & Design | Creation Office Fitouts');
        SEOMeta::setDescription('Leading interior design company in Nairobi, Kenya. Specializing in office fitouts, commercial interior design, office refurbishments, partitioning, ceiling & flooring. Professional interior designers creating functional and elegant workspaces.');
        SEOMeta::setKeywords('interior designer Kenya, office fitouts Nairobi, commercial interior design, office refurbishments Kenya, interior design company Nairobi, office partitioning, ceiling flooring Kenya, workspace design');
        SEOMeta::setCanonical(url('/'));
        SEOMeta::addMeta('robots', 'index, follow');
        SEOMeta::addMeta('author', 'Creation Office Fitouts');
        SEOMeta::addMeta('geo.region', 'KE');
        SEOMeta::addMeta('geo.placename', 'Nairobi');
        SEOMeta::addMeta('geo.position', '-1.2921;36.8219');
        SEOMeta::addMeta('ICBM', '-1.2921, 36.8219');

        // Open Graph Tags
        OpenGraph::setTitle('Interior Designer in Kenya | Office Fitouts & Design | Creation Office Fitouts');
        OpenGraph::setDescription('Leading interior design company in Nairobi, Kenya. Specializing in office fitouts, commercial interior design, office refurbishments, partitioning, ceiling & flooring.');
        OpenGraph::setUrl(url('/'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_KE');
        OpenGraph::addProperty('site_name', 'Creation Office Fitouts');
        if($sliders->count() > 0) {
            OpenGraph::addImage(url('/uploads/slider/' . $sliders->first()->image));
        }

        // Twitter Card
        TwitterCard::setTitle('Interior Designer in Kenya | Office Fitouts & Design | Creation Office Fitouts');
        TwitterCard::setDescription('Leading interior design company in Nairobi, Kenya. Specializing in office fitouts, commercial interior design, office refurbishments.');
        TwitterCard::setSite('@creationoffice1');
        TwitterCard::setType('summary_large_image');
        if($sliders->count() > 0) {
            TwitterCard::addImage(url('/uploads/slider/' . $sliders->first()->image));
        }

        // JSON-LD Structured Data
        JsonLd::setTitle('Creation Office Fitouts - Interior Designer in Kenya');
        JsonLd::setDescription('Leading interior design company in Nairobi, Kenya specializing in office fitouts and commercial interior design.');
        JsonLd::setType('Organization');
        JsonLd::addValue('@id', url('/'));
        JsonLd::addValue('name', 'Creation Office Fitouts');
        JsonLd::addValue('url', url('/'));
        JsonLd::addValue('logo', url('/theme/images/logos.png'));
        JsonLd::addValue('address', [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Nas Apartments, Laikipia Rd',
            'addressLocality' => 'Nairobi',
            'addressCountry' => 'KE'
        ]);
        JsonLd::addValue('contactPoint', [
            '@type' => 'ContactPoint',
            'telephone' => '+254-723-768-593',
            'contactType' => 'customer service',
            'email' => 'info@creationltd.co.ke'
        ]);
        JsonLd::addValue('sameAs', [
            'https://www.facebook.com/creationltd',
            'https://twitter.com/creationoffice1',
            'https://www.linkedin.com/company/creation-office-fitouts/',
            'https://www.instagram.com/creation_office_fitout/'
        ]);

        $title = "Creation Office Fitouts";
        return view('front.index', compact('title', 'sliders'));
    }

    public function center_of_excellences(){
        $Service = DB::table('services')->get();
        
        // Comprehensive SEO Meta Tags
        SEOMeta::setTitle('Interior Design Services in Kenya | Office Fitouts, Construction & Refurbishment | Creation Office Fitouts');
        SEOMeta::setDescription('Professional interior design services in Nairobi, Kenya. We offer office fitouts, interior architecture, construction, refurbishment, partitioning, ceiling & floors, and furniture supplies. Transform your workspace with our expert design solutions.');
        SEOMeta::setKeywords('interior design services Kenya, office fitouts Nairobi, interior architecture, office construction Kenya, office refurbishment Nairobi, partitioning services, ceiling flooring, furniture supplies Kenya, commercial interior design');
        SEOMeta::setCanonical(url('/center-of-excellence'));
        SEOMeta::addMeta('robots', 'index, follow');

        // Open Graph Tags
        OpenGraph::setTitle('Interior Design Services in Kenya | Office Fitouts & Construction | Creation Office Fitouts');
        OpenGraph::setDescription('Professional interior design services in Nairobi, Kenya. Office fitouts, interior architecture, construction, refurbishment, partitioning, ceiling & floors, and furniture supplies.');
        OpenGraph::setUrl(url('/center-of-excellence'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_KE');

        // Twitter Card
        TwitterCard::setTitle('Interior Design Services in Kenya | Office Fitouts & Construction');
        TwitterCard::setDescription('Professional interior design services in Nairobi, Kenya. Office fitouts, interior architecture, construction, refurbishment.');
        TwitterCard::setSite('@creationoffice1');

        // JSON-LD Structured Data
        JsonLd::setTitle('Interior Design Services - Creation Office Fitouts');
        JsonLd::setDescription('Professional interior design services in Nairobi, Kenya including office fitouts, interior architecture, construction, and refurbishment.');
        JsonLd::setType('Service');
        JsonLd::addValue('serviceType', 'Interior Design Services');
        JsonLd::addValue('areaServed', [
            '@type' => 'Country',
            'name' => 'Kenya'
        ]);
        JsonLd::addValue('provider', [
            '@type' => 'Organization',
            'name' => 'Creation Office Fitouts',
            'url' => url('/')
        ]);

        $title = "Center of Excellence";
        return view('front.center_of_excellences', compact('title','Service'));
    }
    
    public function careers(){
        // Comprehensive SEO Meta Tags
        SEOMeta::setTitle('Careers | Join Our Interior Design Team in Nairobi, Kenya | Creation Office Fitouts');
        SEOMeta::setDescription('Join Creation Office Fitouts - a leading interior design company in Nairobi, Kenya. Career opportunities for interior designers, project managers, and design professionals. Build your career in commercial interior design and office fitouts.');
        SEOMeta::setKeywords('interior design jobs Kenya, interior designer careers Nairobi, office fitout jobs, commercial interior design careers, design jobs Kenya, Creation Office Fitouts careers');
        SEOMeta::setCanonical(url('/careers'));
        SEOMeta::addMeta('robots', 'index, follow');

        // Open Graph Tags
        OpenGraph::setTitle('Careers | Join Our Interior Design Team in Nairobi, Kenya');
        OpenGraph::setDescription('Join Creation Office Fitouts - career opportunities for interior designers and design professionals.');
        OpenGraph::setUrl(url('/careers'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_KE');

        // Twitter Card
        TwitterCard::setTitle('Careers | Join Our Interior Design Team');
        TwitterCard::setDescription('Join Creation Office Fitouts - career opportunities for interior designers.');
        TwitterCard::setSite('@creationoffice1');

        // JSON-LD Structured Data
        JsonLd::setTitle('Careers - Creation Office Fitouts');
        JsonLd::setDescription('Career opportunities at Creation Office Fitouts - interior design company in Nairobi, Kenya');
        JsonLd::setType('WebPage');
        JsonLd::addValue('@id', url('/careers'));

        $title = "Careers";
        return view('front.careers', compact('title'));
    }

    public function center_of_excellence($slung){
        $Service = DB::table('services')->where('slung',$slung)->get();
        foreach ($Service as $key => $value) {
            $serviceTitle = $value->title ?? 'Interior Design Service';
            $serviceDescription = strip_tags($value->content ?? 'Professional interior design service in Nairobi, Kenya');
            $serviceImage = $value->image ? url('/uploads/services/' . $value->image) : url('/theme/images/logos.png');
            
            // Comprehensive SEO Meta Tags
            SEOMeta::setTitle($serviceTitle . ' in Kenya | Professional ' . $serviceTitle . ' Services | Creation Office Fitouts');
            SEOMeta::setDescription('Professional ' . strtolower($serviceTitle) . ' services in Nairobi, Kenya. ' . Str::limit($serviceDescription, 150) . ' Trusted interior design contractor specializing in ' . strtolower($serviceTitle) . ' for offices and commercial spaces.');
            SEOMeta::setKeywords(strtolower($serviceTitle) . ' Kenya, ' . strtolower($serviceTitle) . ' Nairobi, ' . strtolower($serviceTitle) . ' services, interior design ' . strtolower($serviceTitle) . ', office ' . strtolower($serviceTitle) . ' Kenya');
            SEOMeta::setCanonical(url('/center-of-excellence/' . $slung));
            SEOMeta::addMeta('robots', 'index, follow');

            // Open Graph Tags
            OpenGraph::setTitle($serviceTitle . ' in Kenya | Creation Office Fitouts');
            OpenGraph::setDescription('Professional ' . strtolower($serviceTitle) . ' services in Nairobi, Kenya. Trusted interior design contractor.');
            OpenGraph::setUrl(url('/center-of-excellence/' . $slung));
            OpenGraph::addProperty('type', 'website');
            OpenGraph::addProperty('locale', 'en_KE');
            OpenGraph::addImage($serviceImage);

            // Twitter Card
            TwitterCard::setTitle($serviceTitle . ' in Kenya | Creation Office Fitouts');
            TwitterCard::setDescription('Professional ' . strtolower($serviceTitle) . ' services in Nairobi, Kenya.');
            TwitterCard::setSite('@creationoffice1');
            TwitterCard::setType('summary_large_image');
            TwitterCard::addImage($serviceImage);

            // JSON-LD Structured Data
            JsonLd::setTitle($serviceTitle . ' - Creation Office Fitouts');
            JsonLd::setDescription('Professional ' . strtolower($serviceTitle) . ' services in Nairobi, Kenya.');
            JsonLd::setType('Service');
            JsonLd::addValue('serviceType', $serviceTitle);
            JsonLd::addImage($serviceImage);
            JsonLd::addValue('areaServed', [
                '@type' => 'City',
                'name' => 'Nairobi'
            ]);
            JsonLd::addValue('provider', [
                '@type' => 'Organization',
                'name' => 'Creation Office Fitouts',
                'url' => url('/')
            ]);

            $title = $value->title;
            return view('front.center_of_excellence', compact('Service','title'));
        }
    }


    public function folio($id){
        $Portfolio = Portfolio::where('slung',$id)->get();
        
        foreach ($Portfolio as $port) {
            $projectTitle = $port->title ?? 'Interior Design Project';
            $projectDescription = strip_tags($port->content ?? 'Professional interior design project completed in Kenya');
            $projectImage = $port->image_one ? url('/uploads/portfolios/' . $port->image_one) : url('/theme/images/logos.png');
            $projectClient = $port->client ?? 'Commercial Client';
            $projectLocation = 'Nairobi, Kenya';
            
            // Comprehensive SEO Meta Tags
            SEOMeta::setTitle($projectTitle . ' | Interior Design Project Portfolio | Creation Office Fitouts');
            SEOMeta::setDescription('View our completed interior design project: ' . $projectTitle . ' in ' . $projectLocation . '. ' . Str::limit($projectDescription, 150) . ' Professional office fitouts and commercial interior design by Creation Office Fitouts.');
            SEOMeta::setKeywords(strtolower($projectTitle) . ', interior design project Kenya, office fitout project Nairobi, commercial interior design portfolio, ' . strtolower($projectClient) . ' office design');
            SEOMeta::setCanonical(url('/portfolio/' . $id));
            SEOMeta::addMeta('robots', 'index, follow');
            SEOMeta::addMeta('article:published_time', $port->created_at ? $port->created_at->toIso8601String() : now()->toIso8601String());
            SEOMeta::addMeta('article:author', 'Creation Office Fitouts');

            // Open Graph Tags
            OpenGraph::setTitle($projectTitle . ' | Interior Design Project Portfolio');
            OpenGraph::setDescription('View our completed interior design project: ' . $projectTitle . ' in ' . $projectLocation);
            OpenGraph::setUrl(url('/portfolio/' . $id));
            OpenGraph::addProperty('type', 'article');
            OpenGraph::addProperty('locale', 'en_KE');
            OpenGraph::addImage($projectImage);
            if($port->created_at) {
                OpenGraph::addProperty('article:published_time', $port->created_at->toIso8601String());
            }

            // Twitter Card
            TwitterCard::setTitle($projectTitle . ' | Interior Design Project Portfolio');
            TwitterCard::setDescription('View our completed interior design project: ' . $projectTitle);
            TwitterCard::setSite('@creationoffice1');
            TwitterCard::setType('summary_large_image');
            TwitterCard::addImage($projectImage);

            // JSON-LD Structured Data
            JsonLd::setTitle($projectTitle);
            JsonLd::setDescription('Interior design project completed by Creation Office Fitouts in ' . $projectLocation);
            JsonLd::setType('CreativeWork');
            JsonLd::addValue('@id', url('/portfolio/' . $id));
            JsonLd::addImage($projectImage);
            JsonLd::addValue('creator', [
                '@type' => 'Organization',
                'name' => 'Creation Office Fitouts',
                'url' => url('/')
            ]);
            JsonLd::addValue('locationCreated', [
                '@type' => 'Place',
                'name' => $projectLocation
            ]);
            if($port->created_at) {
                JsonLd::addValue('datePublished', $port->created_at->toIso8601String());
            }

            $title = "Our Portfolio";
            return view('front.folio', compact('title','Portfolio'));
        }
    }

    public function portfolio(){
        $portfolios = Portfolio::latest()->take(6)->get();
        
        // Comprehensive SEO Meta Tags
        SEOMeta::setTitle('Interior Design Portfolio | Office Fitout Projects in Kenya | Creation Office Fitouts');
        SEOMeta::setDescription('Browse our portfolio of completed interior design projects in Kenya. Office fitouts, commercial interior design, refurbishments, and workspace transformations. See our professional interior design work for offices, retail spaces, and commercial buildings in Nairobi.');
        SEOMeta::setKeywords('interior design portfolio Kenya, office fitout projects Nairobi, commercial interior design portfolio, office design examples Kenya, workspace design portfolio, interior design gallery Nairobi');
        SEOMeta::setCanonical(url('/portfolio'));
        SEOMeta::addMeta('robots', 'index, follow');

        // Open Graph Tags
        OpenGraph::setTitle('Interior Design Portfolio | Office Fitout Projects in Kenya');
        OpenGraph::setDescription('Browse our portfolio of completed interior design projects in Kenya. Office fitouts, commercial interior design, and workspace transformations.');
        OpenGraph::setUrl(url('/portfolio'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_KE');
        if($portfolios->count() > 0 && $portfolios->first()->image_one) {
            OpenGraph::addImage(url('/uploads/portfolios/' . $portfolios->first()->image_one));
        }

        // Twitter Card
        TwitterCard::setTitle('Interior Design Portfolio | Office Fitout Projects in Kenya');
        TwitterCard::setDescription('Browse our portfolio of completed interior design projects in Kenya.');
        TwitterCard::setSite('@creationoffice1');
        TwitterCard::setType('summary_large_image');
        if($portfolios->count() > 0 && $portfolios->first()->image_one) {
            TwitterCard::addImage(url('/uploads/portfolios/' . $portfolios->first()->image_one));
        }

        // JSON-LD Structured Data
        JsonLd::setTitle('Interior Design Portfolio - Creation Office Fitouts');
        JsonLd::setDescription('Portfolio of completed interior design projects in Kenya including office fitouts and commercial interior design.');
        JsonLd::setType('CollectionPage');
        JsonLd::addValue('@id', url('/portfolio'));
        JsonLd::addValue('mainEntity', [
            '@type' => 'ItemList',
            'numberOfItems' => Portfolio::count()
        ]);

        $title = "Our Portfolio";
        return view('front.portfolio', compact('title'));
    }

    public function contact_us(){
        // Comprehensive SEO Meta Tags
        SEOMeta::setTitle('Contact Us | Interior Designer in Nairobi, Kenya | Creation Office Fitouts');
        SEOMeta::setDescription('Contact Creation Office Fitouts for professional interior design services in Nairobi, Kenya. Office fitouts, commercial interior design, refurbishments, and workspace solutions. Call +254 723 768 593 or email info@creationltd.co.ke');
        SEOMeta::setKeywords('contact interior designer Kenya, interior design company Nairobi, office fitout contractor contact, commercial interior design Kenya, Creation Office Fitouts contact');
        SEOMeta::setCanonical(url('/contact-us'));
        SEOMeta::addMeta('robots', 'index, follow');

        // Open Graph Tags
        OpenGraph::setTitle('Contact Us | Interior Designer in Nairobi, Kenya');
        OpenGraph::setDescription('Contact Creation Office Fitouts for professional interior design services in Nairobi, Kenya.');
        OpenGraph::setUrl(url('/contact-us'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_KE');

        // Twitter Card
        TwitterCard::setTitle('Contact Us | Interior Designer in Nairobi, Kenya');
        TwitterCard::setDescription('Contact Creation Office Fitouts for professional interior design services.');
        TwitterCard::setSite('@creationoffice1');

        // JSON-LD Structured Data
        JsonLd::setTitle('Contact Creation Office Fitouts');
        JsonLd::setDescription('Contact information for Creation Office Fitouts - Interior Designer in Nairobi, Kenya');
        JsonLd::setType('ContactPage');
        JsonLd::addValue('@id', url('/contact-us'));
        JsonLd::addValue('mainEntity', [
            '@type' => 'Organization',
            'name' => 'Creation Office Fitouts',
            'url' => url('/'),
            'telephone' => '+254-723-768-593',
            'email' => 'info@creationltd.co.ke',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Nas Apartments, Laikipia Rd',
                'addressLocality' => 'Nairobi',
                'addressCountry' => 'KE'
            ]
        ]);

        $title = "Contact Us";
        return view('front.contact_us', compact('title'));
    }

    public function company(){
        // Comprehensive SEO Meta Tags
        SEOMeta::setTitle('About Us | Leading Interior Design Company in Nairobi, Kenya | Creation Office Fitouts');
        SEOMeta::setDescription('Learn about Creation Office Fitouts - a leading interior design company in Nairobi, Kenya. We specialize in office fitouts, commercial interior design, refurbishments, and workspace solutions. Professional interior designers with expertise in creating functional and elegant office spaces.');
        SEOMeta::setKeywords('about interior design company Kenya, interior designer Nairobi, office fitout company, commercial interior design firm Kenya, Creation Office Fitouts about, interior design team Nairobi');
        SEOMeta::setCanonical(url('/about-us'));
        SEOMeta::addMeta('robots', 'index, follow');

        // Open Graph Tags
        OpenGraph::setTitle('About Us | Leading Interior Design Company in Nairobi, Kenya');
        OpenGraph::setDescription('Learn about Creation Office Fitouts - a leading interior design company in Nairobi, Kenya specializing in office fitouts and commercial interior design.');
        OpenGraph::setUrl(url('/about-us'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_KE');
        OpenGraph::addImage(url('/theme/images/logos.png'));

        // Twitter Card
        TwitterCard::setTitle('About Us | Leading Interior Design Company in Nairobi, Kenya');
        TwitterCard::setDescription('Learn about Creation Office Fitouts - a leading interior design company in Nairobi, Kenya.');
        TwitterCard::setSite('@creationoffice1');
        TwitterCard::setType('summary_large_image');
        TwitterCard::addImage(url('/theme/images/logos.png'));

        // JSON-LD Structured Data
        JsonLd::setTitle('About Creation Office Fitouts');
        JsonLd::setDescription('Leading interior design company in Nairobi, Kenya specializing in office fitouts and commercial interior design.');
        JsonLd::setType('AboutPage');
        JsonLd::addValue('@id', url('/about-us'));
        JsonLd::addValue('mainEntity', [
            '@type' => 'Organization',
            'name' => 'Creation Office Fitouts',
            'url' => url('/'),
            'logo' => url('/theme/images/logos.png'),
            'description' => 'Leading interior design company in Nairobi, Kenya specializing in office fitouts and commercial interior design.',
            'foundingDate' => '2010',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Nas Apartments, Laikipia Rd',
                'addressLocality' => 'Nairobi',
                'addressCountry' => 'KE'
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+254-723-768-593',
                'contactType' => 'customer service',
                'email' => 'info@creationltd.co.ke'
            ]
        ]);

        $title = "About Us";
        return view('front.company', compact('title'));
    }



    public function terms_and_conditions(){
        // Comprehensive SEO Meta Tags
        SEOMeta::setTitle('Terms and Conditions | Creation Office Fitouts - Interior Design Services');
        SEOMeta::setDescription('Terms and conditions for Creation Office Fitouts interior design services in Nairobi, Kenya. Office fitouts, commercial interior design, and workspace solutions.');
        SEOMeta::setCanonical(url('/terms-and-conditions'));
        SEOMeta::addMeta('robots', 'noindex, follow');

        // Open Graph Tags
        OpenGraph::setTitle('Terms and Conditions | Creation Office Fitouts');
        OpenGraph::setDescription('Terms and conditions for Creation Office Fitouts interior design services.');
        OpenGraph::setUrl(url('/terms-and-conditions'));
        OpenGraph::addProperty('type', 'website');

        // Twitter Card
        TwitterCard::setTitle('Terms and Conditions | Creation Office Fitouts');
        TwitterCard::setDescription('Terms and conditions for Creation Office Fitouts interior design services.');
        TwitterCard::setSite('@creationoffice1');

        $title = "Terms and Conditions";
        return view('front.terms-and-conditions', compact('title'));
    }

    public function copyright(){
        // Comprehensive SEO Meta Tags
        SEOMeta::setTitle('Copyright Statement | Creation Office Fitouts');
        SEOMeta::setDescription('Copyright statement for Creation Office Fitouts - interior design company in Nairobi, Kenya.');
        SEOMeta::setCanonical(url('/copyright'));
        SEOMeta::addMeta('robots', 'noindex, follow');

        // Open Graph Tags
        OpenGraph::setTitle('Copyright Statement | Creation Office Fitouts');
        OpenGraph::setDescription('Copyright statement for Creation Office Fitouts.');
        OpenGraph::setUrl(url('/copyright'));
        OpenGraph::addProperty('type', 'website');

        // Twitter Card
        TwitterCard::setTitle('Copyright Statement | Creation Office Fitouts');
        TwitterCard::setDescription('Copyright statement for Creation Office Fitouts.');
        TwitterCard::setSite('@creationoffice1');

        $title = "Copyright Statement";
        return view('front.copyright', compact('title'));
    }

    public function privacy_policy(){
        // Comprehensive SEO Meta Tags
        SEOMeta::setTitle('Privacy Policy | Creation Office Fitouts - Data Protection & Privacy');
        SEOMeta::setDescription('Privacy policy for Creation Office Fitouts - interior design company in Nairobi, Kenya. Learn how we protect your personal information and data.');
        SEOMeta::setCanonical(url('/privacy-policy'));
        SEOMeta::addMeta('robots', 'noindex, follow');

        // Open Graph Tags
        OpenGraph::setTitle('Privacy Policy | Creation Office Fitouts');
        OpenGraph::setDescription('Privacy policy for Creation Office Fitouts - learn how we protect your personal information.');
        OpenGraph::setUrl(url('/privacy-policy'));
        OpenGraph::addProperty('type', 'website');

        // Twitter Card
        TwitterCard::setTitle('Privacy Policy | Creation Office Fitouts');
        TwitterCard::setDescription('Privacy policy for Creation Office Fitouts.');
        TwitterCard::setSite('@creationoffice1');

        $title = "Privacy Policy";
        return view('front.privacy-policy', compact('title'));
    }

    public function blogs($slung){
        $Blog = DB::table('blogs')->where('slung',$slung)->get();
        foreach ($Blog as $key => $value) {
            $blogTitle = $value->title ?? 'Interior Design Blog';
            $blogDescription = strip_tags($value->content ?? 'Interior design insights and tips');
            $blogImage = $value->image ? url('/uploads/blogs/' . $value->image) : url('/theme/images/logos.png');
            $blogMeta = $value->meta ?? 'Interior design, office fitouts, commercial design';
            
            // Comprehensive SEO Meta Tags
            SEOMeta::setTitle($blogTitle . ' | Interior Design Blog | Creation Office Fitouts');
            SEOMeta::setDescription(Str::limit($blogDescription, 155) . ' | Interior design insights, tips, and trends from Creation Office Fitouts - leading interior design company in Nairobi, Kenya.');
            SEOMeta::setKeywords($blogMeta . ', interior design blog Kenya, office design tips, commercial interior design insights, workspace design trends');
            SEOMeta::setCanonical(url('/blog/' . $slung));
            SEOMeta::addMeta('robots', 'index, follow');
            SEOMeta::addMeta('article:published_time', $value->created_at ? date('c', strtotime($value->created_at)) : now()->toIso8601String());
            SEOMeta::addMeta('article:author', 'Creation Office Fitouts');
            SEOMeta::addMeta('article:section', 'Interior Design');

            // Open Graph Tags
            OpenGraph::setTitle($blogTitle . ' | Interior Design Blog');
            OpenGraph::setDescription(Str::limit($blogDescription, 200));
            OpenGraph::setUrl(url('/blog/' . $slung));
            OpenGraph::addProperty('type', 'article');
            OpenGraph::addProperty('locale', 'en_KE');
            OpenGraph::addImage($blogImage);
            if($value->created_at) {
                OpenGraph::addProperty('article:published_time', date('c', strtotime($value->created_at)));
            }
            OpenGraph::addProperty('article:author', 'Creation Office Fitouts');
            OpenGraph::addProperty('article:section', 'Interior Design');

            // Twitter Card
            TwitterCard::setTitle($blogTitle . ' | Interior Design Blog');
            TwitterCard::setDescription(Str::limit($blogDescription, 200));
            TwitterCard::setSite('@creationoffice1');
            TwitterCard::setType('summary_large_image');
            TwitterCard::addImage($blogImage);

            // JSON-LD Structured Data
            JsonLd::setTitle($blogTitle);
            JsonLd::setDescription(Str::limit($blogDescription, 200));
            JsonLd::setType('BlogPosting');
            JsonLd::addValue('@id', url('/blog/' . $slung));
            JsonLd::addImage($blogImage);
            JsonLd::addValue('headline', $blogTitle);
            JsonLd::addValue('author', [
                '@type' => 'Organization',
                'name' => 'Creation Office Fitouts',
                'url' => url('/')
            ]);
            JsonLd::addValue('publisher', [
                '@type' => 'Organization',
                'name' => 'Creation Office Fitouts',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => url('/theme/images/logos.png')
                ]
            ]);
            if($value->created_at) {
                JsonLd::addValue('datePublished', date('c', strtotime($value->created_at)));
            }
            if($value->updated_at) {
                JsonLd::addValue('dateModified', date('c', strtotime($value->updated_at)));
            }

            $title = $value->title;
            return view('front.blog', compact('title','Blog'));
        }
    }


    public function show(){
        $Table = DB::select('SHOW TABLES');
        foreach ($Table as $key => $value) {
            # code...
            echo $value->Tables_in_royal;
            echo ",";
        }

    }


    public function message(Request $request){
        // Check if message has links
        if($request->verify_contact == $request->verify_contact_input){
            $name = $request->name;
            $email = $request->email;
            $subject = $request->subject;
            $phone = $request->phone;
            $message = $request->message;
            $Joiner = "Hello Admin, User with name $name, and email $email, Phone Number $phone and Website $subject : Has Sent an Enquiry as -> $message";
            ReplyMessage::sendMessage($name,$email,$Joiner);
            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => true]);
        }
    }

    public function submitMessage(Request $request){
        if(!empty($request->input('checkmate'))) {
            Session::flash('message', "Your Message Has Been Sent");
            return Redirect::back();
        }else{
            $from = $request->email;
            $name = $request->name;
            $message = $request->message;
            $subject = $request->subject;

            $Message = new Message;
            $Message->name = $name;
            $Message->email = $from;
            $Message->subject = $subject;
            $Message->content = $message;

            $Message->save();


            $reply = 'You have Received a Message From Creations Office Fitouts, Login To the admins Panel to reply';
            $name = 'Admin';
            $id = 0;

            $email = 'info@creationltd.co.ke';

            ReplyMessage::SendMessage($message,$subject,$name,$email,$id,$from);

            Session::flash('message', "Your Message Has Been Sent");
            return Redirect::back();
        }

    }

}


