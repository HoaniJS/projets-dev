import { useContext, useState } from 'react';
import { ColorContext } from '../contexts/ColorContext';

function Counter() {
    const [value, setValue] = useState(0)
    const colorContext = useContext(ColorContext);

    return (
        <>
            <div>
                <h2 className='text-2xl font-bold text-black mb-6 text-center' style={{ color: colorContext }}>{value}</h2>
                <button
                    onClick={() => {
                        setValue(value - 1)
                    }}
                    className="mx-1 px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors"
                    style={{cursor: "pointer"}}
                >
                    Diminuer
                </button>
                <button
                    onClick={() => {
                        setValue(0)
                    }}
                    className="mx-1 px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors"
                    style={{cursor: "pointer"}}
                >
                    Réinitialiser
                </button>
                <button
                    onClick={() => {
                        setValue(value + 1)
                    }}
                    className="mx-1 px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors"
                    style={{cursor: "pointer"}}
                >
                    Augmenter
                </button>
            </div>
        </>
    )
}

export default Counter