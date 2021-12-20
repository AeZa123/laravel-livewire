<div>
    <h1 class="text-3xl">Comments</h1>

    <form wire:submit.prevent='addComment' class="flex mt-4">
        <input wire:model.defer='newComment' type="text" class="w-full p-2 my-2 mr-2 border rounded shadow" placeholder="What's in your mind.">
        <div class="py-2">
            <button type="submit" class="w-20 p-2 text-white bg-blue-500 rounded shadow">Add</button>
        </div>
    </form>

    
    @foreach ($comments as $comment)
        <div class="p-3 my-4 border rounded shadow">
            <div class="flex justify-start my-2">
                <p class="text-lg font-bold">{{$comment->creator->name}}</p>
                <p class="py-1 mx-3 text-xs font-semibold text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
            <p class="text-gray-800">{{ $comment->body }}
            </p>
        </div>
    @endforeach
   
</div>