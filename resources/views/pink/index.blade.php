@extends(env('THEME').'.layouts.site')

@section('navigation')
{!! $navigation !!}
@endsection

@section('slider')
{!! $sliders !!}
@endsection

@section('content')
{!! $portfolios !!}
@endsection

@section('sidebar')
{!! $sidebar !!}
@endsection

@section('footer')
{!! $footer !!}
@endsection
