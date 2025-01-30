import { useState } from "react";

export default function RegistroEstudiante() {
  const [nombres, setNombres] = useState("");
  const [apellidoPaterno, setApellidoPaterno] = useState("");
  const [apellidoMaterno, setApellidoMaterno] = useState("");
  const [email, setEmail] = useState("");
  const [cuenta, setCuenta] = useState("");
  const [password, setPassword] = useState("");
  const [repetirPassword, setRepetirPassword] = useState("");

  const handleSubmit = (e) => {
    e.preventDefault();
    alert("Registro enviado");
  };

  return (
    <div className="flex justify-center items-center min-h-screen bg-gray-100">
      <div className="relative">
        <button className="absolute -top-10 -right-10 px-4 py-2 bg-red-600 text-white rounded-md font-bold">X</button>
      </div>
      <div className="bg-white p-6 rounded-lg shadow-md w-96 text-center">
        <h2 className="text-2xl font-bold mb-4">REGISTRO ESTUDIANTE</h2>
        <form onSubmit={handleSubmit} className="space-y-4">
          <input type="text" placeholder="Nombres" value={nombres} onChange={(e) => setNombres(e.target.value)} className="border border-gray-300 px-4 py-2 rounded-md w-full" required />
          <div className="flex gap-2">
            <input type="text" placeholder="Apellido Paterno" value={apellidoPaterno} onChange={(e) => setApellidoPaterno(e.target.value)} className="border border-gray-300 px-4 py-2 rounded-md w-full" required />
            <input type="text" placeholder="Apellido Materno" value={apellidoMaterno} onChange={(e) => setApellidoMaterno(e.target.value)} className="border border-gray-300 px-4 py-2 rounded-md w-full" required />
          </div>
          <input type="email" placeholder="Correo Electrónico" value={email} onChange={(e) => setEmail(e.target.value)} className="border border-gray-300 px-4 py-2 rounded-md w-full" required />
          <input type="text" placeholder="Nombre de la Cuenta" value={cuenta} onChange={(e) => setCuenta(e.target.value)} className="border border-gray-300 px-4 py-2 rounded-md w-full" required />
          <input type="password" placeholder="Contraseña" value={password} onChange={(e) => setPassword(e.target.value)} className="border border-gray-300 px-4 py-2 rounded-md w-full" required />
          <input type="password" placeholder="Repetir Contraseña" value={repetirPassword} onChange={(e) => setRepetirPassword(e.target.value)} className="border border-gray-300 px-4 py-2 rounded-md w-full" required />
          <button type="submit" className="w-full bg-blue-600 text-white py-2 rounded-md font-bold hover:bg-blue-700">REGISTRARSE</button>
        </form>
        <div className="mt-4 text-sm">
          ¿Ya tienes cuenta? <a href="#" className="text-blue-600">Iniciar Sesión</a>
        </div>
      </div>
    </div>
  );
}
