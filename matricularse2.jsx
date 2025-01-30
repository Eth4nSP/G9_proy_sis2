import { useState } from "react";

export default function MatricularseDocente() {
  const [menuOpen, setMenuOpen] = useState(false);
  const [userOpen, setUserOpen] = useState(false);
  const [codigo, setCodigo] = useState("");

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
    <div onClick={closeDropdowns} className="bg-white min-h-screen font-sans">
      <header className="bg-blue-800 text-white flex justify-between items-center p-4 relative">
        <div className="relative">
          <div onClick={toggleMenu} className="cursor-pointer p-2 font-bold">&#9776; WEB TIS</div>
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

      <div className="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <button onClick={() => window.history.back()} className="mb-4 px-4 py-2 bg-gray-300 rounded">Atrás</button>
        <h1 className="text-2xl font-bold text-center mb-4">MATRICULARSE CON UN DOCENTE</h1>
        <div className="text-center mb-6">
          <strong>Blanco Coca Leticia G1</strong>
          <p className="text-gray-600">Descripción de Leticia desde la base</p>
        </div>
        <form className="flex flex-col items-center space-y-4">
          <label htmlFor="codigo" className="font-semibold">Código de acceso:</label>
          <input 
            type="text" 
            id="codigo" 
            value={codigo} 
            onChange={(e) => setCodigo(e.target.value)} 
            placeholder="CÓDIGO" 
            className="border border-gray-400 px-4 py-2 rounded-md w-64 text-center"
          />
          <button type="button" className="px-6 py-2 bg-black text-white rounded-md font-bold hover:bg-gray-700">MATRICULARSE</button>
        </form>
      </div>
    </div>
  );
}
