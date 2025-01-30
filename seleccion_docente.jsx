import { useState } from "react";

export default function SeleccionarDocente() {
  const [menuOpen, setMenuOpen] = useState(false);
  const [userMenuOpen, setUserMenuOpen] = useState(false);

  const toggleMenuDropdown = () => setMenuOpen(!menuOpen);
  const toggleUserDropdown = () => setUserMenuOpen(!userMenuOpen);

  return (
    <div className="bg-gray-100 min-h-screen">
      <header className="flex justify-between items-center bg-blue-700 text-white p-4 relative">
        <div className="cursor-pointer font-bold" onClick={toggleMenuDropdown}>
          &#9776; WEB TIS
        </div>
        {menuOpen && (
          <div className="absolute left-4 top-12 bg-white shadow-md rounded p-2">
            <a href="#" className="block px-4 py-2 text-black">Visualizar Planificaciones</a>
            <a href="#" className="block px-4 py-2 text-black">Lista de tareas Semanal</a>
            <a href="#" className="block px-4 py-2 text-black">Grupo-Empresas</a>
            <a href="#" className="block px-4 py-2 text-black">Calificaciones</a>
          </div>
        )}
        <div className="relative cursor-pointer" onClick={toggleUserDropdown}>
          &#128100;
          {userMenuOpen && (
            <div className="absolute right-0 top-12 bg-white shadow-md rounded p-2">
              <a href="#" className="block px-4 py-2 text-black">Perfil</a>
              <a href="#" className="block px-4 py-2 text-black">Cerrar sesión</a>
            </div>
          )}
        </div>
      </header>

      <main className="flex justify-between items-center p-6 bg-white mx-6 mt-6 rounded-lg shadow-md">
        <div className="w-1/2">
          <h2 className="text-xl font-bold mb-4">SELECCIONAR DOCENTE PARA MATRICULACIÓN</h2>
          <button className="w-full bg-gray-300 py-3 mb-2 rounded hover:bg-gray-400">BLANCO COCA LETICIA</button>
          <button className="w-full bg-gray-300 py-3 mb-2 rounded hover:bg-gray-400">FLORES VILLARROEL CORINA</button>
          <button className="w-full bg-gray-300 py-3 mb-2 rounded hover:bg-gray-400">GRIEGO VAZQUES ESTEBAN</button>
          <button className="w-full bg-gray-300 py-3 mb-2 rounded hover:bg-gray-400">BLANCO COCA LETICIA</button>
        </div>
        <div className="w-1/2 text-center">
          <img src="https://via.placeholder.com/400x300" alt="Ilustración de docente" className="mx-auto" />
        </div>
      </main>

      <div className="text-center mt-6">
        <button className="px-6 py-3 bg-gray-300 rounded hover:bg-gray-400">Volver</button>
      </div>
    </div>
  );
}