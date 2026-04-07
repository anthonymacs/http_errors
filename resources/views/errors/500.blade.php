@extends('errors::minimal')

@section('title', 'Server Error')
@section('code', '500')
@section('message', 'Internal Server Error')
@section('icon', '💥')
@section('header-bg', 'linear-gradient(135deg, #1f1f1f 0%, #2d1515 50%, #450a0a 100%)')
@section('description', 'Something went wrong on our end. Our team has been automatically notified and is working hard to fix the issue.')