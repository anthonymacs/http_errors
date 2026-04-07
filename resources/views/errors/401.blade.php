@extends('errors::minimal')

@section('title', 'Unauthorized')
@section('code', '401')
@section('message', 'Unauthorized')
@section('icon', '🔒')
@section('header-bg', 'linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%)')
@section('description', 'You need to be authenticated to access this resource. Please log in and try again.')   