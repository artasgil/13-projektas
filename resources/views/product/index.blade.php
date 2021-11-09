


        @if($products->count()==0)
        <p>No products</p>
        @endif

        <table>
            <tr>
                <th> ID</th>
                <th> Title</th>
                <th> Price </th>
                <th> Excertpt </th>
                <th> Description </th>
                <th> Action </th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }} </td>
                    <td>{{ $product->title }} </td>
                    <td>{{ $product ->price}} </td>
                    <td>{{ $product->excertpt }} </td>
                    <td>{{$product ->description }} </td>

                </tr>
            @endforeach
        </table>
