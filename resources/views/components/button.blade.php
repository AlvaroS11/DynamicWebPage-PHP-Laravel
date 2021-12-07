@props(['category'])

<div class="space-x-2">

    @foreach ($category as $object)
   
    <a href="/categories/{{$object->slug}}"
        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
        style="font-size: 10px">{{$object->name}}</a>
@endforeach
</div>