
import React from 'react';
import './scss/App.scss';
import { useState } from 'react';
import Main from "./componenets/main/Main";
import Navbar from './componenets/navbar/Navbar';
import Sidebar from './componenets/sidebar/Sidebar';
const App = () => {
  //const items = props.settings.some_items || [];
  const[ sidebarOpen, setSidebarOpen] = useState(false);
  const openSidebar = () => {
    setSidebarOpen(true);
  }

  const closeSidebar = () => {
    setSidebarOpen(false);
  }
  return (
    <div className="container">
      <Navbar sidebarOpen={sidebarOpen} openSidebar={openSidebar}/>
      <Main/>
      <Sidebar sidebarOpen={sidebarOpen} closeSidebar={closeSidebar}/>
    </div>
  );
}

export default App;
