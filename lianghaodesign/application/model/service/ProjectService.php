<?php
require_once 'model/service/BaseService.php';
require_once 'model/entity/Project.php';
require_once 'model/entity/ProjectImage.php';

class ProjectService extends BaseService {
    
    /** remove a project */
    public function removeProject($projectId) {
        $project = $this->getProject($projectId);
        if (!isset($project)) {
            throw new Exception("Failed to retrieve Project by id $projectId");
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
    
    public function getProjects($programId) {
        $projects = $this->dbService->query('select p from Project p where p.programId=:pid order by p.displayOrder',
                                            array('pid' => $programId));
        return $projects;
    }
    
    /** get projects
        $args include:
            page            (optional, value is 1 by default)
            countPerPage    (optional, value is 20 by default)
    
    */
    public function getProjectsByPage(array $args = null) {
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
    public function saveProject(array $data) {
        $time = NFUtil::now();
        $data['updatedTime'] = $time;
        if (array_key_exists('id', $data)) {
            $project = $this->getProject($data['id']);
            $project->initialize($data);
        } else {
            $project = new Project;
            $data['createdTime'] = $time;
            $project->initialize($data);
        }
        
        if ($project->isValid()) {
            $this->dbService->save($project);
        }
        
        return $project;
    }
    
    public function getImages($projectId, $isPreviewed) {
        $sql = 'select i from ProjectImage i where i.projectId=:pid and i.isPreviewed=:ip order by i.displayOrder';
        $images = $this->dbService->query($sql, array('pid' => $projectId, 'ip' => $isPreviewed));
        return $images;
    }
    
    public function getImage($imageId) {
        $sql = 'select i from ProjectImage i where i.id=:id';
        $images = $this->dbService->query($sql, array(id => $imageId));
        return !empty($images) ? $images[0] : null;
    }
    
    public function saveImage(array $data) {
        $time = NFUtil::now();
        $data['updatedTime'] = $time;
        if (array_key_exists('id', $data)) {
            $image = $this->getImage($data['id']);
            $image->initialize($data);
        } else {
            $image = new ProjectImage;
            $data['createdTime'] = $time;
            $image->initialize($data);
        }
        
        if ($image->isValid()) {
            $this->dbService->save($image);
        }
        
        return $image;
    }
    
}

?>