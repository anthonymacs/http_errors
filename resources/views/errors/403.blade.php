@extends('errors::minimal')

@section('title', 'Forbidden')
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('icon', '🚫')
@section('header-bg', 'linear-gradient(135deg, #2d1515 0%, #3d1a1a 50%, #7f1d1d 100%)')
@section('description', "You don't have permission to access this resource. Contact your administrator if you believe this is a mistake.")