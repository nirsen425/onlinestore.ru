@extends('product.layouts.layout')

@section('content')
    @if ($errors->any())
        <div class="bg-danger">
            @foreach($errors->all() as $error)
                {{ $error }}
                <br>
            @endforeach
        </div>
    @endif
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <label for="title">Название</label><br>
        <input type="text" name="title" id="title" value="{{ $product->title }}"><br>
        <label for="description">Описание</label><br>
        <textarea name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea><br>
        <label for="price">Цена</label><br>
        <input type="text" name="price" id="price" value="{{ $product->price }}"><br>
        <label for="image">Картинка</label><br>
        <input type="file" name="image" id="image"><br>
        <label for="availability">Доступность</label><br>
        <input type="checkbox" name="availability" id="availability" @if ($product->availability == 1) checked @endif" value="1"><br>
        <label for="category" >Категория</label><br>
        <select name="category" id="category" value="{{ $product->category_id }}"><br>
            @foreach($categories as $category)
                <option>{{ $category->title }}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>
@endsection
