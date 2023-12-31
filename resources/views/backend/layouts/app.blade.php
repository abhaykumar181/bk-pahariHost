<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        @include('backend.layouts.includes.head')
    </head>
    <body class="sidebar-mini layout-fixed">
        <div class="wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2 bg-dark px-0 sidebar-fix">
						@include('backend.layouts.includes.sidebar')
					</div>
					<div class="col-md-10 px-0 content-right">
						@include('backend.layouts.includes.header')

						<div class="content-wrapper pb-5">
							@yield('content')
						</div>
						
						@include('backend.layouts.includes.footer')
					</div>
				</div>
			</div>
		</div>


        @include('backend.layouts.includes.scripts')
        
    </body>
</html>
