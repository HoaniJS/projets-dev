import { Link } from 'react-router-dom'

function Home() {
    return (
        <>
            <div className='relative max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6 text-center flex flex-col items-center justify-center'>
                <h1 className='text-3xl font-bold text-gray-800 mb-6 text-center'>Site concepts</h1>
                <div className='grid grid-cols-3 gap-4'>
                <Link to='/counters'>
                    <div className='rounded-lg border p-2 bg-white hover:bg-gray-100 transition-colors'>
                        <h2 className='text-2xl font-bold text-gray-800 mb-6 text-center'>Compteur</h2>
                        <img src='./src/img/counter.png' alt='Compteur'/>
                    </div>
                </Link>
                
                <Link to='/tabs'>
                    <div className='rounded-lg border p-2 bg-white hover:bg-gray-100 transition-colors'>
                        <h2 className='text-2xl font-bold text-gray-800 mb-6 text-center'>Tableaux</h2>
                        <img src='./src/img/tabs.png' alt='Dossier avec intercalaires'/>
                    </div>
                </Link>
                </div>
            </div>
        </>
    )
}

export default Home