import { useState } from "react"
import Card from "../components/Card"
import Searchbar from "../components/Searchbar"

import movies from '../data/movies'

function Home(){
    const [searchValue, setSearchValue] = useState('')
    const handleSearch = (searchValue) => {
        setSearchValue(searchValue)
    }
    return (
        <>
            <section>
                <h1 class="text-2xl font-bold mt-6 px-2 sm:px-6 lg:px-8">Accueil</h1>
            </section>
            <section>
                <div class="mx-auto mt-6 max-w-7xl px-2 sm:px-6 lg:px-8">
                    <Searchbar value={searchValue} onSearch={handleSearch}/>
                    <div class="grid grid-cols-4 content-start gap-4 mb-6">
                        {movies.map((movie, index) => (
                            movie.title.toLowerCase().includes(searchValue.toLowerCase()) && (
                                <Card path={movie.path} title={movie.title} release_date={movie.release_date} key={index}/>
                            )
                        ))}
                    </div>
                </div>
            </section>
        </>
    )
}

export default Home