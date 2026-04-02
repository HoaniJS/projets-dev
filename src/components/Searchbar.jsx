function Searchbar({value, onSearch}){
    const handleChange = (e) => {
        onSearch(e.target.value)
    }
    return (
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="search" class="block text-sm/6 font-medium text-gray-900">Rechercher un film</label>
                <div class="mt-2">
                    <input value={value} onChange={handleChange} id="search" type="text" name="search" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                </div>
            </div>
        </div>
    )
}

export default Searchbar