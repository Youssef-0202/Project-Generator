<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/temp1.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <div class="template-section" data-section="Navbar">
            @if(isset($componentsData['Navbar']))
                <x-template1.nav-bar :content="$componentsData['Navbar']"/>
            @endif
        </div>
        <!-- Masthead-->
        <div class="template-section" data-section="Masthead">
            @if(isset($componentsData['Masthead']))
            <x-template1.mast-head :content="$componentsData['Masthead']"/>
            @endif      
        </div> 
         <!-- Services-->
        <div class="template-section" data-section="Services">
            @if(isset($componentsData['Services']))
            <x-template1.services  :content="$componentsData['Services']"/>
            @endif
        </div>
        <!-- Portfolio Grid-->
        <div class="template-section" data-section="Portfolio">
            @if (isset($componentsData['Portfolio']))
            <x-template1.portfolio :content="$componentsData['Portfolio']" />
            @endif
        </div>
        <!-- About-->
        <div class="template-section" data-section="About">
            @if (isset($componentsData['About']))
            <x-template1.about :content="$componentsData['About']" />
            @endif
        </div>
        <!-- Team-->
        <div class="template-section" data-section="Team">
            @if (isset($componentsData['Team']))
            <x-template1.team :content="$componentsData['Team']" />
            @endif
        </div>
        <!-- Clients-->
        <div class="template-section" data-section="Clients">
            @if (isset($componentsData['Clients']))
            <x-template1.client :content="$componentsData['Clients']" />
            @endif
        </div>
        <!-- Contact-->
        <x-template1.contact/>  
        <!-- Footer-->       
        <div class="template-section" data-section="Footer">
            @if (isset($componentsData['Footer']))
            <x-template1.footer :content="$componentsData['Footer']" />
            @endif
        </div>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <x-template1.p-modals/>
                <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scriptsTemp1.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
