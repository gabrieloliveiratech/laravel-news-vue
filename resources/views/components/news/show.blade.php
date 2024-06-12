@extends('components.layouts.app')

@section('content')
<show-news :news="{{ $news }}"></show-news>
@endsection