import React, { useState, useEffect } from "react";

const App = () => {
  const [menuDropdownActive, setMenuDropdownActive] = useState(false);
  const [userDropdownActive, setUserDropdownActive] = useState(false);

  const toggleDropdown = (dropdown) => {
    if (dropdown === "menu") {
      setMenuDropdownActive(!menuDropdownActive);
      setUserDropdownActive(false);
    } else if (dropdown === "user") {
      setUserDropdownActive(!userDropdownActive);
      setMenuDropdownActive(false);
    }
  };

  useEffect(() => {
    const handleClickOutside = () => {
      setMenuDropdownActive(false);
      setUserDropdownActive(false);
    };
    
    document.addEventListener('click', handleClickOutside);
    return () => {
      document.removeEventListener('click', handleClickOutside);
    };
  }, []);

  return (
    <div>
      <header>
        <div className="menu-container">
          <div className="menu" onClick={(e) => { e.stopPropagation(); toggleDropdown("menu"); }}>&#9776; WEB TIS</div>
          <div className={`dropdown ${menuDropdownActive ? 'active' : ''}`} id="menu-dropdown">
            <a href="#">Visualizar Planificaciones</a>
            <a href="#">Lista de tareas Semanal</a>
            <a href="#">Grupo-Empresas</a>
            <a href="#">Calificaciones</a>
          </div>
        </div>
        <div className="user-container">
          <div className="user-icon" onClick={(e) => { e.stopPropagation(); toggleDropdown("user"); }}>&#128100;</div>
          <div className={`dropdown ${userDropdownActive ? 'active' : ''}`} id="user-dropdown">
            <a href="#">Profile</a>
            <a href="#">Cerrar sesión</a>
          </div>
        </div>
      </header>

      <div className="container">
        <h2>CREAR GRUPO</h2>
        <input type="text" placeholder="Número de grupo" />
        <select>
          <option>2024-1</option>
        </select>
        <input type="text" placeholder="Código de Acceso" />
        <p className="info">
          Cuando termina una fase inmediatamente comienza la próxima.<br />
          Todas las fechas terminan en 23:00
        </p>
        <label>Inicio semestre</label>
        <input type="date" />
        <label>Inicio grupo</label>
        <input type="date" />
        <label>Inicio proyecto</label>
        <input type="date" />
        <label>Fin grupo</label>
        <input type="date" />
        <label>Fin proyecto</label>
        <input type="date" />
        <label>Fin semestre</label>
        <input type="date" />
        <textarea placeholder="Comentarios"></textarea>
        <button className="submit-btn">Crear Grupo</button>
      </div>

      <style>
        {`
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            text-align: center;
          }

          header {
            background-color: #3367d6;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            position: relative;
          }

          .menu-container, .user-container {
            position: relative;
            display: inline-block;
          }

          .menu, .user-icon {
            font-size: 18px;
            cursor: pointer;
            padding: 10px;
            position: relative;
          }

          .dropdown {
            position: absolute;
            top: 40px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: none;
            width: 200px;
            z-index: 1000;
            text-align: left;
          }

          .dropdown.active {
            display: block;
          }

          .dropdown a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
            border-bottom: 1px solid #eee;
            font-size: 16px;
          }

          .dropdown a:last-child {
            border-bottom: none;
          }

          .dropdown a:hover {
            background-color: #f2f2f2;
          }

          #menu-dropdown {
            left: 0;
          }

          #user-dropdown {
            right: 0;
          }

          .container {
            margin: 50px auto;
            width: 50%;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: left;
          }

          input, select, textarea {
            width: 100%;
            margin: 10px;
            margin-right: 90px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
          }

          .info {
            color: blue;
            font-size: 14px;
          }

          .submit-btn {
            background-color: #3f51b5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            text-align: center;
          }

          .submit-btn:hover {
            background-color: #2c3e97;
          }
        `}
      </style>
    </div>
  );
};

export default App;
