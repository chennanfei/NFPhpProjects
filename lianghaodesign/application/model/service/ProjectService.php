<?php
class ProjectService {
    
    /** delete a project */
    public function deleteProject($projectID) {
        $project = $this->getProject($projectID);
        if (!isset($project)) {
            throw new Exception("Failed to retrieve project by id $projectID");
        }
        
        $this->dbService->remove($project);
    }
    
    public function getProject($projctID) {
        if (empty($projctID)) {
            throw new Exception('Empty project ID!');
        }

        $projects = $this->dbService->query('select p from Project p where p.id=:pid',
            array(pid => $projctID));

        return !empty($projects) ? $projects[0] : null;
    }
    
    /** get projects
        $args include:
            page            (optional, value is 1 by default)
            countPerPage    (optional, value is 20 by default)
    
    */
    public function getProjects(array $args = null) {
        $page = isset($args) && is_numeric($args['page']) ? $args['page'] : 1;
        $countPerPage = isset($args) && is_numeric($args['countPerPage']) ? $args['countPerPage'] : 20;
        
        $offset = ($page - 1) * $countPerPage;
        if (!(isset($offset) && is_numeric($offset) && $offset >= 0)) {
            $offset = 0;
        }
        
        $qb = $this->dbService->getQueryBuilder();
        $qb->add('select', 'p')
            ->add('from', 'Project p')
            ->add('orderBy', 'p.date DESC')
            ->setFirstResult($offset)
            ->setMaxResults($countPerPage);

        return $qb->getQuery->getResult();
    }
    
    /** create or update a project
        args include:
            id              (optional)
            cnAddress       (optional)
            cnDescription   (optional)
            cnTitle         (required)
            date            (required)
            enAddress       (optional)
            enDescription   (optional)
            enTitle         (required)
    */
    public function saveProject(array $args) {
        
    }
    
    
    private function validateParameters(array $args) {
        
    }
}

?>