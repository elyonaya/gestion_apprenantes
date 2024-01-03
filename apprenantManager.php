<?php
if (!function_exists('databaseIncluded')) {
	include("database.php"); // Assurez-vous que le chemin du fichier est correct
}



class ApprenantManager
{
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	// CRUD pour les apprenants
	public function createApprenant($nom, $prenom, $email)
	{
		$conn = $this->db->connect();

		// Utilisation de requêtes préparées pour éviter les attaques par injection SQL
		$stmt = $conn->prepare("INSERT INTO APPRENANTS (apprenant_nom, apprenant_prenom, apprenant_email) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $nom, $prenom, $email);

		if ($stmt->execute()) {
			$stmt->close();
			$conn->close();
			return true; // Succès de la création
		} else {
			$stmt->close();
			$conn->close();
			return false; // Échec de la création
		}
	}

	public function updateApprenant($id, $nom, $prenom, $email)
	{
		$conn = $this->db->connect();

		// Utilisation de requêtes préparées pour éviter les attaques par injection SQL
		$stmt = $conn->prepare("UPDATE APPRENANTS SET apprenant_nom = ?, apprenant_prenom = ?, apprenant_email = ? WHERE apprenant_id = ?");
		$stmt->bind_param("sssi", $nom, $prenom, $email, $id);

		if ($stmt->execute()) {
			$stmt->close();
			$conn->close();
			return true; // Succès de la mise à jour
		} else {
			$stmt->close();
			$conn->close();
			return false; // Échec de la mise à jour
		}
	}

	public function deleteApprenant($id)
	{
		$conn = $this->db->connect();

		// Utilisation de requêtes préparées pour éviter les attaques par injection SQL
		$stmt = $conn->prepare("DELETE FROM APPRENANTS WHERE apprenant_id = ?");
		$stmt->bind_param("i", $id);

		if ($stmt->execute()) {
			$stmt->close();
			$conn->close();
			return true; // Succès de la suppression
		} else {
			$stmt->close();
			$conn->close();
			return false; // Échec de la suppression
		}
	}


}
