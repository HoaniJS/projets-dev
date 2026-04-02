import React, { useState, useEffect, useContext } from 'react'
import FavoritesKeyContext from '../contexts/FavoritesKeyContext'

function Favorites(){
    const FAVORITES_KEY = useContext(FavoritesKeyContext)
    const [favorites, setFavorites] = useState([])

    useEffect(() => {
        const data = localStorage.getItem(FAVORITES_KEY)
        if (data){
            setFavorites(JSON.parse(data))
        }
    }, [FAVORITES_KEY])

    function removeFavorite(index){
        const newFavorites = favorites.filter((favorite, i) => i !== index)
        setFavorites(newFavorites)
        localStorage.setItem(FAVORITES_KEY, JSON.stringify(newFavorites))
    }

    return (
        <div className='min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-8'>
            <div className='max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6'>
                <h1 className='text-3xl font-bold text-gray-800 mb-6 text-center'>BEST punchlines</h1>
                {favorites.length === 0 ?
                    <p className='text-center'>Aucun favoris.</p>
                : (
                    favorites.map((favorite, index) => (
                        <p>
                            <span
                                className='mr-1 text-lg'
                                onClick={() => {
                                    removeFavorite(index)
                                }}
                                style={{cursor: "pointer"}}
                            >
                                ❌ 
                            </span>
                            <span key={index} className='text-lg italic'>”{favorite}”</span>
                        </p>
                    ))
                )}
            </div>
        </div>
    )
}

export default Favorites