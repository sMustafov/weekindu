<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Weekindu</title>
        <meta charset="utf-8"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link rel="stylesheet" href="/css/dropify/dropify.min.css"/>
        <link rel="stylesheet" href="/css/materialize/palette.css"/>
        <link rel="stylesheet" href="/css/custom/main.css"/>           
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.js"></script>    
    </head>
    <body id="app-layout">
        <nav class="default-primary-color">
            <div class="nav-wrapper container">
                <div class="row">
                    <div class="col s12 m6 l2 center">
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>                                
                        <a href="{{url('/')}}" class="waves-effect"><b>Weekindu</b></a>
                    </div>
                    <div class="col l6 hide-on-med-and-down">
                        <ul>
                            <li>
                                <a href="{{ url('/event') }}" class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="View All events">Events</a>
                            </li>
                        </ul>
                    </div>                    
                    
                    <div class="col l4 m6 right-align hide-on-small-only">
                        <ul class="right">                    
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}"> Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else

                            <li class="waves-effect hide-on-med-and-down">                            
                                <div class="container-fluid valign-wrapper">
                                    <a class="tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Create New Event" href="#new-event-modal"><i class="material-icons">add</i></a>
                                </div> 
                            </li>
                            
                            <div id="new-event-modal" class="modal primary-text-color left-align">                                
                                <div class="modal-content">
                                    <form method="POST" action="{{url('/event')}}" id="create-event-modal-form">
                                        <h4>Create A New Event</h4>
                                        <!-- BEGIN FORM FOR CREATING NEW EVENT -->
                                        {!! csrf_field() !!}    
                                        <div class="row"> 
                                             <div class="input-field col l12 m12 s12">
                                                 Title
                                                <input name="title" type="text" class="validate" placeholder="e.g. &quot;John's birthday&quot;" maxlength="80" required>                                                     
                                             </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col l12 m12 s12">
                                                Description
                                                <textarea name="description" class="materialize-textarea" placeholder="Tell us briefly what this event is going to be about" required></textarea>                                                     
                                            </div>
                                        </div>                                            
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button form="create-event-modal-form" type="submit" class="waves-effect waves-red btn-flat default-primary-color text-primary-color">Create</button>
                                    <a href="#" class="modal-action modal-close waves-effect waves-teal btn-flat">Cancel</a>
                                </div>

                                <!-- END FORM FOR CREATING NEW EVENT -->  
                            </div>

                            <li class="dropdown-button waves-effect" data-activates="user-menu">
                                <div class="container-fluid valign-wrapper">
                                    <div class="col l6">
                                        <img src="/images/user-avatars/{{Auth::user()->avatar}}" class="circle responsive-img valign" width="40">
                                    </div>
                                    <div>
                                        {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->first_name }}                                        
                                    </div>

                                    <ul id="user-menu" class="dropdown-content col l4 m8">
                                        <li><a href="{{url('/logout')}}">Logout</a></li>
                                    </ul>
                                </div> 
                            </li>
                            @endif
                        </ul>
                    </div>                
                </div>
            </div>

            <ul class="side-nav" id="mobile-demo">
                <li><a href="{{url('/home')}}">Home</a></li>
                <li><a href="{{url('/event')}}">Events</a></li>
                <li><a href="{{url('/event/create')}}">Create a new Event</a></li>
                @if (!Auth::guest())
                    <div class="hide-on-med-and-up">
                        <li class="divider divider-color"></li>
                        <li>
                            <div class="row valign-wrapper">
                                <div class="col s4 valign">
                                    <img src="/images/user-avatars/{{Auth::user()->avatar}}" class="circle responsive-img valign" width="40">
                                </div>
                                <div class="col s8 valign">
                                    {{ Auth::user()->name }}    
                                </div>
                            </div>                       
                        </li>
                        <li><a href="{{url('/logout')}}">Logout</a></li>
                    </div>
                @endif  
            </ul>
        </nav>

        <div class="container">
            <br>
            @yield('content')
        </div>
        
        <!-- JavaScripts -->                
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>    
        <script src="/js/jquery/main.js" defer></script>
        <script src="/js/dropify/dropify.min.js"></script>
        <script src="/js/config/main.js"></script>           
    </body>
</html>