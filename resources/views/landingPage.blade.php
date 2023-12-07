@extends('layouts.app')
@vite(['public/style/landingPage.css', 'public/style/style1.css'])
@section('content')

<div class="container-xxl">
    <div class="position-relative box-shadow">
        <div class="imagehead" >
            <div class="div_image"></div>
        </div>
        <div class="col-lg-5 col-lg-5 bg-white p-5 position-absolute top-50 end-0 box-shadow mx-5">
                <h1 class="font-weight-light h1">Craft The Perfect CV Resume</h1>
                <hr class="border border-primary border-3 opacity-75 w-50">
                <p class="h6 mb-3">This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
                <a class="btn btn-primary me-2 rounded-0 p-2" href="#!">CREATE CV</a>
                <a class="btn btn-outline-primary rounded-0 p-2" href="#!">SING UP</a>
            </div>
        </div>
    </div>

    <div class="m-5 p-5">
        <div class="my-3 py-5"></div>
    </div>
    
    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div id="templates" class="py-2">
                <div>
                    <div class="text-center mb-2"><h1 class="header-300">TEMPLATES</h1></div>
                    <hr class="border border-primary border-3 opacity-75 mb-3" style="margin: 0 auto; width: 25%">
                    <div class="">
                        <style>
                            .slider {
                            width: 100%;
                            overflow: hidden;
                            position: relative;
                            }

                            .slides {
                            display: flex;
                            transition: transform 0.3s ease-in-out;
                            }

                            .slide {
                                flex: 0 0 30%; /* Each slide occupies one-third of the container */
                                padding: 0 10px;
                            }

                            @media (max-width: 768px){
                                .slide {
                                    flex: 0 0 50%;
                                }
                            }

                            .slide img {
                                max-width: 100%;
                                height: auto;
                            }

                            .controls {
                                position: absolute;
                                bottom: 10px;
                                left: 50%;
                                transform: translateX(-50%);
                            }

                            .controls button {
                            margin: 0 5px;
                            }
                        </style>
                        <div class="slider">
                            <div class="slides">
                                <div class="slide shadow m-2 mb-5 bg-body rounded">
                                    <img src="{{ asset('/images/t2.svg')}}" alt="Image 1">
                                </div>
                                <div class="slide shadow m-2 mb-5 bg-body rounded">
                                    <img src="{{ asset('/images/t1.svg')}}" alt="Image 2">
                                </div>
                                <div class="slide shadow  m-2 mb-5 bg-body rounded">
                                    <img src="{{ asset('/images/t3.svg')}}" alt="Image 3">
                                </div>
                                <!-- Add more slides as needed -->
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        
        <!-- Call to Action-->
        <div class="card text-white bg-secondary my-5 py-4 text-center">
            <div class="card-body"><p class="text-white m-0">This call to action card is a great place to showcase some important information or display a clever tagline!</p></div>
        </div>
        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            <div id="services">
                <div class="text-center mb-2"><h1 class="header-300">SERVICES</h1></div>
                <hr class="border border-primary border-3 opacity-75 mb-3" style="margin: 0 auto; width: 25%">
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card One</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm rounded-0" href="#!">More Info</a></div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card Two</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm rounded-0" href="#!">More Info</a></div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card Three</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm rounded-0" href="#!">More Info</a></div>
                </div>
            </div>
        </div>

        <div class="row gx-4 gx-lg-5 my-5">
            <div class="team d-flex align-items-start" id="team">
                <div class="col-md-6">
                    <h3 class="header-300">TEAM</h3>
                    <hr class="border border-primary border-3 opacity-75 w-25 mb-3">
                    
                </div>      
            </div>
        </div>

        <div class="about row gx-4 gx-lg-5 my-5">
            <div class="col-md-6">
                <h3 class="header-300">ABOUT</h3>
                <hr class="border border-primary border-3 opacity-75 w-25 mb-3">
                <p >At Resume Wizard, we believe that creating a professional resume should be simple,
                    fast and accessible to everyone. Whether you are a CEO or at the beginning of your career, 
                    the next step in your career always starts with the good first impression that you convey by your CV.<br/>
                    we have launched this simple website to create online resumes. This site has gradually become a platform offering practical career tools that have been developed in collaboration with experienced career development specialists. Every day, we are working on improving our resume and cover letter templates, the job offers offered and our tools for managing your applications so that our users can focus on their job search.</p>
                </p>
            </div>
            <div class="col-md-6">
                <div class="img-bg m-2 " >
                    <img class="img-bg" src="{{ asset('/images/800_5cda471fdcad7.jpg')}}">
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="position-relative">
            <div class="col-9 position-absolute z-3 top-50 start-50 translate-middle text-center">
                <div><h1 class="font-weight-light h1 display-6 text-2xl md:text-3xl lg:text-4xl mb-3">Create a Standout CV Resume</h1></div>
                <hr class="border border-primary border-3 opacity-75 mb-3" style="margin: 0 auto; width: 30%">
                <div class="mb-3"><h4 class="h3">Craft Your Professional Story</h4></div>
                <div class=""><a class="btn btn-primary me-2 rounded-0 p-3" href="#!">GET STARTED</a></div>
            </div>
            <div class="background-footer">
                <div class="footer-image"></div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy 2023; All rights reserved Cv Resume</p></div>
        </footer>
    </div>
</div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
@endsection