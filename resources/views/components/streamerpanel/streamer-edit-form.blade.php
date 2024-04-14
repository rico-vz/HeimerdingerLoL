<form action="{{ route('streamerpanel.update', $streamer->id) }}" method="POST" class="w-10/12 mx-auto">
    @csrf
    <div class="flex flex-col space-y-4">
        <div class="flex flex-col space-y-2">
            <label for="champion_id" class="text-lg font-semibold text-orange-400">Champion</label>
            <select name="champion_id" required id="champion_id" class="w-full p-2 text-white rounded-md bg-stone-800">
                <option value="">Select a champion</option>
                @foreach ($champions as $champion)
                    <option value="{{ $champion->champion_id }}" {{ $champion->champion_id == $streamer->champion_id ? 'selected' : '' }}>{{ $champion->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="platform" class="text-lg font-semibold text-orange-400">Platform</label>
            <select name="platform" id="platform" class="w-full p-2 text-white rounded-md bg-stone-800">
                <option value="twitch" {{ $streamer->platform == 'twitch' ? 'selected' : '' }}>Twitch</option>
                <option value="youtube" {{ $streamer->platform == 'youtube' ? 'selected' : '' }}>YouTube</option>
                <option value="kick" {{ $streamer->platform == 'kick' ? 'selected' : '' }}>Kick</option>
                <option value="douyu" {{ $streamer->platform == 'douyu' ? 'selected' : '' }}>Douyu</option>
                <option value="huya" {{ $streamer->platform == 'huya' ? 'selected' : '' }}>Huya</option>
            </select>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="username" class="text-lg font-semibold text-orange-400">Username</label>
            <input type="text" name="username" id="username" value="{{ $streamer->username }}"
                class="w-full p-2 text-white rounded-md bg-stone-800" />
        </div>
        <div class="flex flex-col space-y-2">
            <label for="displayname" class="text-lg font-semibold text-orange-400">Display Name</label>
            <input type="text" name="displayname" id="displayname" value="{{ $streamer->displayname }}"
                class="w-full p-2 text-white rounded-md bg-stone-800" />
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 mt-3 text-white bg-orange-500 rounded-md">Update Streamer</button>
        </div>
    </div>
</form>
