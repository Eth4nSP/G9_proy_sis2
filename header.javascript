import { useState } from "react";

const Header = () => {
  const [menuOpen, setMenuOpen] = useState(false);
  const [userOpen, setUserOpen] = useState(false);

  const toggleMenu = (event) => {
    event.stopPropagation();
    setMenuOpen(!menuOpen);
    setUserOpen(false);
  };

  const toggleUser = (event) => {
    event.stopPropagation();
    setUserOpen(!userOpen);
    setMenuOpen(false);
  };

  const closeDropdowns = () => {
    setMenuOpen(false);
    setUserOpen(false);
  };

  return (
    <header onClick={closeDropdowns} className="bg-blue-600 text-white flex justify-between items-center p-4 relative">
      <div className="relative inline-block">
        <div className="cursor-pointer text-lg p-2" onClick={toggleMenu}>
          &#9776; WEB TIS
        </div>
        {menuOpen && (
          <div className="absolute left-0 top-12 bg-white shadow-lg rounded-lg w-48 z-10">
            <a href="#" className="block px-4 py-2 text-gray-800 border-b hover:bg-gray-200">Visualizar Planificaciones</a>
            <a href="#" className="block px-4 py-2 text-gray-800 border-b hover:bg-gray-200">Lista de tareas Semanal</a>
            <a href="#" className="block px-4 py-2 text-gray-800 border-b hover:bg-gray-200">Grupo-Empresas</a>
            <a href="#" className="block px-4 py-2 text-gray-800 hover:bg-gray-200">Calificaciones</a>
          </div>
        )}
      </div>

      <div className="relative inline-block">
        <div className="cursor-pointer text-lg p-2" onClick={toggleUser}>
          &#128100;
        </div>
        {userOpen && (
          <div className="absolute right-0 top-12 bg-white shadow-lg rounded-lg w-48 z-10">
            <a href="#" className="block px-4 py-2 text-gray-800 border-b hover:bg-gray-200">Profile</a>
            <a href="#" className="block px-4 py-2 text-gray-800 hover:bg-gray-200">Cerrar sesión</a>
          </div>
        )}
      </div>
    </header>
  );
};

export default Header;
