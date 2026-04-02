import Counter from "../components/Counter";

function Counters() {
    return (
        <>
            <div className='relative max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6 text-center flex flex-col items-center justify-center'>
                <h1 className='text-3xl font-bold text-gray-800 mb-6 text-center'>Compteur</h1>
                <Counter/>
            </div>
        </>
    )
}

export default Counters