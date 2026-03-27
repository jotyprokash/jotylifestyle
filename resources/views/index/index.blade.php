@extends('layouts.app')

@section('title', 'Signature Collection')

@section('content')

<!-- Hero Collection Section -->
<section class="hero-collection">
    <div class="container">
        <h1>The RedThread Signature</h1>
        <p>A tribute to the art of craftsmanship and the persistence of the university journey. Every piece is a testament to growth, quality, and the pursuit of excellence.</p>
        <a href="#collection" class="btn btn-large waves-effect waves-light">Explore Collection</a>
    </div>
</section>

<div id="collection" class="container" style="padding-top: 50px;">
    
    <!-- Premium Featured Products -->
    <div class="row">
        <div class="col s12">
            <h2 class="center-align" style="margin-bottom: 40px;">Featured Essentials</h2>
        </div>
        
        @foreach($allpopularproducts->take(3) as $product)
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <a href="{{ route('product.show', $product->id) }}">
                        <img src="{{ asset('/productpic/'.$product->picture) }}" alt="{{ $product->title }}">
                    </a>
                </div>
                <div class="card-content center-align">
                    <div class="p-title">{{ $product->title }}</div>
                    <div class="p-price">৳ {{ number_format($product->sellingprice) }}</div>
                    <div style="margin-top: 15px;">
                        <a href="{{ route('product.show', $product->id) }}" class="btn-flat waves-effect" style="color: var(--rt-accent); font-weight: 600;">View Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <hr style="border: 0; border-top: 1px solid var(--rt-grey-light); margin: 60px 0;">

    <!-- Categories / Collections Breakdown -->
    <div class="row">
        <div class="col s12 m6">
            <div class="card" style="background-color: var(--rt-grey-light); padding: 40px;">
                <h3 style="margin-top: 0;">Heritage Collection</h3>
                <p>Traditional silhouettes reimagined with a modern edge. Our Heritage Panjabis are the perfect blend of ancestral roots and contemporary style.</p>
                <a href="{{ route('search', ['query' => 'Panjabi']) }}" class="btn-flat" style="border-bottom: 1px solid var(--rt-black); padding: 0;">Shop Panjabis</a>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card" style="background-color: var(--rt-black); color: var(--rt-white); padding: 40px;">
                <h3 style="color: var(--rt-white); margin-top: 0;">Modern Essentials</h3>
                <p style="color: #ccc;">Elevated basics for the discerning eye. From 100% Egyptian cotton tees to tailored chinos, we define the modern uniform.</p>
                <a href="{{ route('search', ['query' => 'T-Shirt']) }}" class="btn-flat" style="color: var(--rt-white); border-bottom: 1px solid var(--rt-white); padding: 0;">Shop Basics</a>
            </div>
        </div>
    </div>
</div>

@endsection