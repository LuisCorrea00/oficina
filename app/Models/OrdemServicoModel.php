<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdemServicoModel extends Model
{
    protected $table = 'ordem_servico';
    protected $primaryKey = 'idOrdem_servico';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'status',
        'dataHora',
        'descricaoProblema',
        'idVeiculo',
        'idCliente',
        'idEquipe'
    ];

    public function getToDo($idOrdem_servico)
    {
        $builder = $this->db->table('ordem_servico as os')
            ->select('os.idOrdem_servico, os.descricaoProblema, c.idCliente, c.nomeCliente, c.cpf, v.idVeiculo, v.placa, e.idEquipe, e.nomeEquipe, os.dataHora')
            ->join('cliente AS c', 'c.idCliente = os.idCliente')
            ->join('veiculo AS v', 'v.idVeiculo = os.idVeiculo')
            ->join('equipe AS e', 'e.idEquipe = os.idEquipe')
            ->where('os.status', 0);
        if ($idOrdem_servico) {
            $builder->where('os.idOrdem_servico', $idOrdem_servico);
        }
        return $builder->get()->getResultArray();
    }

    public function getDone()
    {
        $builder = $this->db->table('ordem_servico as os')
            ->select('os.idOrdem_servico, c.idCliente, c.nomeCliente, c.cpf, v.idVeiculo, v.placa, e.idEquipe, e.nomeEquipe, os.dataHora, 
            GROUP_CONCAT(DISTINCT s.idServico) AS IDservicos, GROUP_CONCAT(DISTINCT ss.nomeServico) AS nomesServico, 
            SUM(s.valorServico * s.quantidade) AS totalServico, 
            GROUP_CONCAT(DISTINCT pp.nomePeca) AS nomesPeca, GROUP_CONCAT(DISTINCT p.idPeca) AS IDpecas, 
            SUM(p.valorPeca * p.quantidade) AS totalPeca, 
            SUM(s.valorServico * s.quantidade + p.valorPeca * p.quantidade) AS total')
            ->join('cliente AS c', 'c.idCliente = os.idCliente')
            ->join('veiculo AS v', 'v.idVeiculo = os.idVeiculo')
            ->join('equipe AS e', 'e.idEquipe = os.idEquipe')
            ->join('servico_has_ordem_servico AS s', 's.idOrdem_servico = os.idOrdem_servico')
            ->join('peca_has_ordem_servico AS p', 'p.idOrdem_servico = os.idOrdem_servico')
            ->join('servico AS ss', 'ss.idServico = s.idServico')
            ->join('peca AS pp', 'pp.idPeca = p.idPeca')
            ->where('os.status', 1)
            ->groupBy('os.idOrdem_servico, c.idCliente, v.idVeiculo, e.idEquipe, os.dataHora');

        return $builder->get()->getResultArray();
    }

    public function insertOS(array $data)
    {
        if (!empty($data['placa'])) {
            $veiculoModel = new \App\Models\VeiculoModel();

            $veiculo = $veiculoModel->where('placa', $data['placa'])->first();

            if (!empty($veiculo)) {
                $data['idVeiculo'] = $veiculo['idVeiculo'];
                unset($data['placa']);
                $data['status'] = 0;
                $brasiliaTimezone = new \DateTimeZone('America/Sao_Paulo');
                $dataHora = new \DateTime('now', $brasiliaTimezone);
                $data['dataHora'] = $dataHora->format('Y-m-d H:i:s');

                return $this->insert($data);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function insertPeca($idOrdem_servico, $quantidade, $idPeca)
    {
        $pecaModel = new \App\Models\PecaModel();
        $peca = $pecaModel->where('idPeca', $idPeca)->first();
        $data = [
            'idOrdem_servico' => $idOrdem_servico,
            'quantidade' => $quantidade,
            'idPeca' => $idPeca,
            'valorPeca' => $peca['valorPeca']
        ];

        return $this->db->table('peca_has_ordem_servico')->insert($data);
    }

    public function insertServico($idOrdem_servico, $quantidade, $idServico)
    {
        $servicoModel = new \App\Models\ServicoModel();
        $servico = $servicoModel->where('idServico', $idServico)->first();
        $data = [
            'idOrdem_servico' => $idOrdem_servico,
            'quantidade' => $quantidade,
            'idServico' => $idServico,
            'valorServico' => $servico['valorServico']
        ];

        return $this->db->table('servico_has_ordem_servico')->insert($data);
    }

    public function insertDoneOS($idOrdem_servico)
    {
        $data = [
            'status' => 1
        ];

        return $this->update($idOrdem_servico, $data);
    }

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
