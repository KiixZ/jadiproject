@extends('layouts.app')

@section('title', 'Beri Ulasan')

@section('content')
<div class="review-outer-container">
    <div class="review-wrapper">
        <h3 class="review-title">Beri Ulasan Produk</h3>
        @foreach($products as $product)
        <form action="{{ route('reviews.store') }}" method="POST" class="review-form" autocomplete="off">
            @csrf
            <div class="review-product">
                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}">
                <div>
                    <div class="review-product-name">{{ $product->nama_produk }}</div>
                    <div class="review-product-order">Order #{{ $order->order_number }}</div>
                </div>
            </div>
            <input type="hidden" name="produk_id" value="{{ $product->id }}">
            <div class="review-rating">
                @for($i = 1; $i <= 5; $i++)
                    <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}_{{ $product->id }}" required>
                    <label for="star{{ $i }}_{{ $product->id }}" class="star">&#9733;</label>
                @endfor
            </div>
            @error('rating')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            <textarea name="ulasan" rows="4" class="review-textarea @error('ulasan') is-invalid @enderror" required minlength="10" maxlength="255" placeholder="Bagaimana pengalaman Anda dengan produk ini?">{{ old('ulasan') }}</textarea>
            @error('ulasan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="review-actions">
                <button type="submit" class="review-btn review-btn-submit">Submit</button>
                <a href="{{ url()->previous() }}" class="review-btn review-btn-cancel">Cancel</a>
            </div>
        </form>
        @endforeach
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
body, .review-wrapper { font-family: 'Poppins', Arial, sans-serif; }
.review-outer-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fb;
}
.review-wrapper {
    max-width: 700px;
    width: 100%;
    background: #fff;
    border-radius: 32px;
    box-shadow: 0 8px 32px rgba(60,60,60,0.12);
    padding: 3.5rem 2.5rem 2.5rem 2.5rem;
    margin: 0 auto;
}
.review-title {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 2.5rem;
    letter-spacing: -1px;
}
.review-product {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    margin-bottom: 2rem;
}
.review-product img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}
.review-product-name {
    font-weight: 700;
    font-size: 1.25rem;
}
.review-product-order {
    font-size: 1.05rem;
    color: #888;
}
.review-rating {
    display: flex;
    justify-content: center;
    gap: 0.7rem;
    margin-bottom: 2rem;
}
.review-rating input[type="radio"] {
    display: none;
}
.review-rating .star {
    font-size: 2.8rem;
    color: #ddd;
    cursor: pointer;
    transition: color 0.2s, transform 0.1s;
}
.review-rating input[type="radio"]:checked ~ .star,
.review-rating .star:hover,
.review-rating .star:hover ~ .star {
    color: #FFBD13;
    transform: scale(1.18);
}
.review-textarea {
    width: 100%;
    border-radius: 16px;
    border: 1.5px solid #eee;
    padding: 1.2rem;
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    background: #fafbfc;
    transition: border 0.2s;
}
.review-textarea:focus {
    border: 1.5px solid #FFBD13;
    outline: none;
    background: #fffbe7;
}
.review-actions {
    display: flex;
    gap: 1.2rem;
    justify-content: center;
    margin-top: 1.2rem;
}
.review-btn {
    border: none;
    border-radius: 10px;
    padding: 0.9rem 2.5rem;
    font-size: 1.2rem;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.2s, color 0.2s;
}
.review-btn-submit {
    background: #327BFF;
    color: #fff;
}
.review-btn-submit:hover {
    background: #225ed3;
}
.review-btn-cancel {
    background: #f5f5f5;
    color: #888;
    text-decoration: none;
}
.review-btn-cancel:hover {
    background: #eee;
    color: #333;
}
@media (max-width: 800px) {
    .review-wrapper { max-width: 98vw; padding: 2rem 0.5rem; }
    .review-title { font-size: 1.5rem; }
    .review-product img { width: 56px; height: 56px; }
    .review-btn { font-size: 1rem; padding: 0.7rem 1.2rem; }
}
</style>
@endsection
