<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="page-header-fixed">

    @include('partials.analytics')

    <div class="page-header navbar navbar-fixed-top">
        @include('partials.header')
    </div>

    <div class="clearfix"></div>

    <div class="page-container">
        <div class="page-sidebar-wrapper">
            @include('partials.sidebar')
        </div>

        <div class="page-content-wrapper">
            <div class="page-content">

                @if(isset($siteTitle))
                    <h3 class="page-title">
                        {{ $siteTitle }}
                    </h3>
                @endif

                <div class="row">
                    <div class="col-md-12">

                        @if (Session::has('message'))
                            <div class="note note-info">
                                <p>{{ Session::get('message') }}</p>
                            </div>
                        @endif
                        @if ($errors->count() > 0)
                            <div class="note note-danger">
                                <ul class="list-unstyled">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
        <button type="submit">Logout</button>
    {!! Form::close() !!}

    @include('partials.javascripts')
</body>
</html>