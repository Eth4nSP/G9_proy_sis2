import { useState } from "react";

export default function ListaGrupos() {
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
    <div onClick={closeDropdowns} className="bg-gray-100 min-h-screen font-sans">
      <header className="bg-blue-700 text-white flex justify-between items-center p-4 relative">
        <div className="relative">
          <div onClick={toggleMenu} className="cursor-pointer p-2">&#9776; WEB TIS</div>
          {menuOpen && (
            <div className="absolute top-10 left-0 bg-white shadow-lg rounded-lg w-48 z-10">
              <a href="#" className="block px-4 py-2 border-b text-gray-700 hover:bg-gray-200">Visualizar Planificaciones</a>
              <a href="#" className="block px-4 py-2 border-b text-gray-700 hover:bg-gray-200">Lista de tareas Semanal</a>
              <a href="#" className="block px-4 py-2 border-b text-gray-700 hover:bg-gray-200">Grupo-Empresas</a>
              <a href="#" className="block px-4 py-2 text-gray-700 hover:bg-gray-200">Calificaciones</a>
            </div>
          )}
        </div>

        <div className="relative">
          <div onClick={toggleUser} className="cursor-pointer p-2">&#128100;</div>
          {userOpen && (
            <div className="absolute top-10 right-0 bg-white shadow-lg rounded-lg w-40 z-10">
              <a href="#" className="block px-4 py-2 border-b text-gray-700 hover:bg-gray-200">Profile</a>
              <a href="#" className="block px-4 py-2 text-gray-700 hover:bg-gray-200">Cerrar sesión</a>
            </div>
          )}
        </div>
      </header>

      <div className="max-w-4xl mx-auto mt-8 p-6 bg-white rounded-lg shadow">
        <h1 className="text-2xl font-bold mb-4">Lista De Grupos</h1>
        <ol>Lista grupos</ol>
        <a href="#" className="inline-block mt-4 px-4 py-2 bg-blue-900 text-white rounded font-bold">Crear grupo +</a>

        <div className="mt-6">
          <h2 className="text-xl font-semibold">Grupos en curso</h2>
          <ol>Lista grupos en curso</ol>
          <p>No hay grupos en curso.</p>
        </div>

        <div className="mt-6">
          <h2 className="text-xl font-semibold">Grupos pasados</h2>
          <ol>Lista grupos pasados</ol>
          <p>No hay grupos pasados.</p>
        </div>
      </div>
    </div>
  );
}
