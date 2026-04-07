@extends('errors::minimal')

@section('title', 'Too Many Requests')
@section('code', '429')
@section('message', 'Too Many Requests')
@section('icon', '⚡')
@section('header-bg', 'linear-gradient(135deg, #1c1a10 0%, #2d2708 50%, #713f12 100%)')
@section('description', 'You have sent too many requests in a short period of time. Please slow down and try again in a few moments.')