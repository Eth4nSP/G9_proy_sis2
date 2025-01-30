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

      <div className="flex justify-center items-center min-h-[80vh] p-6">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl">
          <div className="bg-white p-6 rounded-lg shadow text-center">
            <h3 className="text-xl font-bold">Grupo Empresa</h3>
            <p className="text-gray-600">Fecha límite de entrega: 2024-12-12</p>
            <button className="mt-4 px-4 py-2 bg-blue-900 text-white rounded">Registrar Grupo o Empresa</button>
          </div>
          <div className="bg-white p-6 rounded-lg shadow text-center">
            <h3 className="text-xl font-bold">Evaluación</h3>
            <button className="mt-4 px-4 py-2 bg-blue-900 text-white rounded">Realizar Evaluación</button>
            <button className="mt-2 px-4 py-2 bg-gray-300 text-gray-600 rounded cursor-not-allowed" disabled>Visualizar Evaluaciones</button>
          </div>
          <div className="bg-white p-6 rounded-lg shadow text-center">
            <h3 className="text-xl font-bold">Lista y Nota</h3>
            <button className="mt-4 px-4 py-2 bg-blue-900 text-white rounded">Lista de Estudiantes</button>
            <button className="mt-2 px-4 py-2 bg-blue-900 text-white rounded">Lista de Grupo de Empresas</button>
          </div>
        </div>
      </div>
    </div>
  );
}
