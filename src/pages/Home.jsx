import React, { useContext, useState, useEffect } from 'react'
import FavoritesKeyContext from '../contexts/FavoritesKeyContext'

function Home(){
    const FAVORITES_KEY = useContext(FavoritesKeyContext)
    const [joke, setJoke] = useState('')
    const [loading, setLoading] = useState(false)
    const [error, setError] = useState('')
    const [favorites, setFavorites] = useState([])

    const loadJoke = async () => {
        setLoading(true)
        setError('')
        try {
            const res = await fetch('https://api.chucknorris.io/jokes/random')
            if (!res.ok){
                throw new Error(`HTTP ${res.status}`)
            }
            const data = await res.json()
            setJoke(data.value)
        }
        catch {
            setError('Impossible de récupérer la joke. Échec de blague')
        }
        finally {
            setLoading(false)
        }
    }

    useEffect(() => {
        const data = localStorage.getItem(FAVORITES_KEY)
        if (data){
            setFavorites(JSON.parse(data))
        }
        loadJoke()
    }, [FAVORITES_KEY])

    const addToFavorites = () => {
        if (!joke){
            return
        }

        if (favorites.includes(joke)){
            removeFavorite(favorites.indexOf(joke))
            return
        }

        const newFavorites = [...favorites, joke]
        setFavorites(newFavorites)
        localStorage.setItem(FAVORITES_KEY, JSON.stringify(newFavorites))
    }

    function removeFavorite(index){
        const newFavorites = favorites.filter((favorite, i) => i !== index)
        setFavorites(newFavorites)
        localStorage.setItem(FAVORITES_KEY, JSON.stringify(newFavorites))
    }

    return (
        <div className='min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-8'>
            <div className='relative max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6 text-center flex flex-col items-center justify-center'>
                <h1 className='text-3xl font-bold text-gray-800 mb-6 text-center'>Punchline ÉPIQUE de Chuck Norris</h1>

                {loading && <p className='mb-6 italic'>Chargement de la masterclass...</p>}
                {error && <p className='mb-6 font-bold'>Erreur : {error}</p>}
                {!loading && !error && <p className='mb-6 text-lg italic'>“{joke}”</p>}
                
                {error &&
                    <button
                        onClick={loadJoke}
                        style={{cursor: "pointer"}}
                        className='px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors'
                    >
                        Réessayer
                    </button>
                }
                {!loading && !error &&
                    <button
                        onClick={loadJoke}
                        style={{cursor: "pointer"}}
                        className='px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors'
                    >
                        Nouvelle blague
                    </button>
                }

                {!loading && !error && favorites.includes(joke) &&
                    <p
                        className='text-xl absolute right-1 bottom-1'
                        style={{cursor: "pointer"}}
                        onClick={addToFavorites}
                    >
                        ❤️
                    </p>
                }
                {!loading && !error && !favorites.includes(joke) &&
                    <p
                        className='text-xl absolute right-1 bottom-1'
                        style={{cursor: "pointer"}}
                        onClick={addToFavorites}
                    >
                        🩶
                    </p>
                }
            </div>
        </div>
    )
}

export default Home