<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');

        $data = [
            [
                'username'       => 'admin',
                'email'          => 'admin@arterion.local',
                'password_hash'  => password_hash('AdminPass123!', PASSWORD_DEFAULT),
                'first_name'     => 'Site',
                'middle_name'    => null,
                'last_name'      => 'Admin',
                'display_name'   => 'Arterion Admin',
                'bio'            => 'Administrator account for Arterion.',
                'gender'         => null,
                'profile_image'  => null,
                'role'           => 'admin',
                'is_artist'      => 0,
                'account_status' => 1,
                'email_activated' => 1,
                'newsletter'     => 0,
                'last_login'     => $now,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'username'       => 'artist_jose',
                'email'          => 'jose.artist@example.com',
                'password_hash'  => password_hash('ArtistPass123!', PASSWORD_DEFAULT),
                'first_name'     => 'Jose',
                'middle_name'    => 'M',
                'last_name'      => 'Santos',
                'display_name'   => 'Jose Santos',
                'bio'            => 'Visual artist — oil & digital paintings.',
                'gender'         => 'male',
                'profile_image'  => null,
                'role'           => 'artist',
                'is_artist'      => 1,
                'account_status' => 1,
                'email_activated' => 1,
                'newsletter'     => 1,
                'last_login'     => null,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'username'       => 'client_ana',
                'email'          => 'ana.client@example.com',
                'password_hash'  => password_hash('ClientPass123!', PASSWORD_DEFAULT),
                'first_name'     => 'Ana',
                'middle_name'    => null,
                'last_name'      => 'Dela Cruz',
                'display_name'   => 'Ana D.',
                'bio'            => 'Collector and art enthusiast.',
                'gender'         => 'female',
                'profile_image'  => null,
                'role'           => 'client',
                'is_artist'      => 0,
                'account_status' => 1,
                'email_activated' => 0,
                'newsletter'     => 1,
                'last_login'     => null,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
        ];

        // insert in batch
        $this->db->table('users')->insertBatch($data);
    }
}
