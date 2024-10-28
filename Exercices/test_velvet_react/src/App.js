import React, { useState, useEffect } from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Navbar from "./components/Navbar";
import DiscList from "./components/DiscList";
import NotFound from "./components/NotFound";
import axios from "axios";

function App() {
  const [discs, setDiscs] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get("http://localhost:5000/api/discs");
        setDiscs(response.data);
      } catch (error) {
        console.error("Erreur lors de la récupération des disques :", error);
      }
    };

    fetchData();
  }, []);

  return (
    <Router>
      <Navbar />
      <Routes>
        <Route path="/" element={<DiscList discs={discs} />} />
        {/* Autres routes pour ton application ici si besoin */}

        {/* Route pour les erreurs 404 */}
        <Route path="*" element={<NotFound />} />
      </Routes>
    </Router>
  );
}

export default App;
