<?php
class User
{
    private string $id;
    private string $email;
    private string $password;
    // Tableau de rôles
    private array $roles = [];
    public function getId(): string
    {
        return $this->id;
    }
    public function addRole(string $role): void
    {
        $this->roles[] = $role;
    }
    public function getRoles(): array
    {
        return $this->roles;
    }
}