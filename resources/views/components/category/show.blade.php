@extends('components.layouts.app')

@section('content')
<show-category :category="{{ $category }}"></show-category>
@endsection