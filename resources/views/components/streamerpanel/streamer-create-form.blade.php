<form action="{{ route('streamerpanel.store') }}" method="POST" class="w-10/12 mx-auto ">
    @csrf
    <div class="flex flex-col space-y-4">
        <div class="flex flex-col space-y-2">
            <label for="champion_id" class="text-lg font-semibold text-orange-400">Champion</label>
            <select name="champion_id" required id="champion_id" class="w-full p-2 text-white rounded-md bg-stone-800">
                <option value="">Select a champion</option>
                @foreach ($champions as $champion)
                    <option value="{{ $champion->champion_id }}">{{ $champion->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="platform" class="text-lg font-semibold text-orange-400">Platform</label>
            <select name="platform" id="platform" class="w-full p-2 text-white rounded-md bg-stone-800">
                <option value="twitch">Twitch</option>
                <option value="youtube">YouTube</option>
                <option value="kick">Kick</option>
                <option value="douyu">Douyu</option>
                <option value="huya">Huya</option>
            </select>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="username" class="text-lg font-semibold text-orange-400">Username</label>
            <input type="text" name="username" id="username"
                class="w-full p-2 text-white rounded-md bg-stone-800" />
        </div>
        <div class="flex flex-col space-y-2">
            <label for="displayname" class="text-lg font-semibold text-orange-400">Display Name</label>
            <input type="text" name="displayname" id="displayname"
                class="w-full p-2 text-white rounded-md bg-stone-800" />
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 mt-3 text-white bg-orange-500 rounded-md">Add Streamer</button>
        </div>
    </div>
</form>
