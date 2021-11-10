
@extends('layouts.app')


@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
{{-- 1. jeigu pridesime elementus su javascript, galesim prideti ju kiek norim,
    nes backendas sugeba suskaiciuoti ir per inspect pridetus elementus
--}}

{{-- 2. Ivesti kazkoki kintamaji nuo kurio priklauso kiek laukeliu yra atvaizduojama
    create.blade.php formoje
--}}

    <form method="get" action="{{route('product.create')}}">
        <input type="text" name="productsCount" value="{{$productsCount}}">
        <button type="submit">Create</button>
    </form>

    <form method="get" action="{{route('product.create')}}">
        <input type="text" name="productsCount" value="{{$productsCount}}" hidden>
        <button type="submit" name="productAdd" value="plus">+</button>
        <button type="submit" name="productAdd" value="minus">-</button>
    </form>

    <div class="addFields">
        <button class="btn btn-primary" id="addFields">Add Fields </button>
    </div>

    <form method="post" action="{{route("product.store")}}">

        @csrf

            <div class="dynamicFields">

                @for ($i=0; $i<$productsCount; $i++ )
                <div class="product">
                    <input type="text" name="productTitle[][title]" />
                    @error("productTitle.".$i.".title")
                        {{$message}}
                    @enderror
                    <input type="text" name="productPrice[][price]" />
                    @error("productPrice.".$i.".title")
                        {{$message}}
                    @enderror
                    <textarea name="productExcerpt[][excerpt]"></textarea>
                    @error("productExcerpt.".$i.".title")
                        {{$message}}
                    @enderror
                    <textarea name="productDescription[][description]"></textarea>
                    @error("productDescription.".$i.".title")
                        {{$message}}
                    @enderror
                    <button type="button" class="btn btn-danger remove-product">-</button>
                </div>
                @endfor
            </div>

            {{-- @error("productTitle")
            {{$message}}
            @enderror --}}



        <button type="submit">Add</button>
    </form>


</div>
<script>
    $(document).ready(function(){
        $("#addFields").click(function() {
            console.log("veikia");
            $(".dynamicFields").append('<div class="product"><input type="text" name="productTitle[][title]" /><input type="text" name="productPrice[][price]" /><textarea name="productExcerpt[][excerpt]"></textarea><textarea name="productDescription[][description]"></textarea><button type="button" class="btn btn-danger remove-product">-</button></div>')
            //i forma mes turime ideti input html
        });
        $(document).on('click', '.remove-product', function() {
            $(this).parents('.product').remove();
        });
    })
</script>

@endsection
