import Tab from "../components/Tab";
import { tabsData, tabsData2 } from "../datas/tabs";

function Tabs() {
    return (
        <>
            <div className='relative max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6 text-center flex flex-col items-center justify-center'>
                <h1 className='text-3xl font-bold text-gray-800 mb-6 text-center'>Tableaux</h1>
                <Tab tabsData={tabsData}/>
                <Tab tabsData={tabsData2}/>
            </div>
        </>
    )
}

export default Tabs