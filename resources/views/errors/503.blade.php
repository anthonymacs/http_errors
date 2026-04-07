@extends('errors::minimal')

@section('title', 'Service Unavailable')
@section('code', '503')
@section('message', 'Service Unavailable')
@section('icon', '🔧')
@section('header-bg', 'linear-gradient(135deg, #0f1a2e 0%, #0c2340 50%, #0c4a6e 100%)')
@section('description', "We're currently performing scheduled maintenance and will be back shortly. We appreciate your patience.")