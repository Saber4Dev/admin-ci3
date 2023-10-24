<!-- person_modals.php -->
<!-- Include all your modals here -->


<!-- ~~~~~~~~~~~~~~~~~~~ Experience Modal ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<!-- Add Experience Modal -->
<div class="modal fade" id="addExperienceModal" tabindex="-1" role="dialog" aria-labelledby="addExperienceModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addExperienceModalLabel">Add Experience</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addExperienceForm" method="post">
                <div class="modal-body">
                    <!-- Add your form fields for adding experience here -->
                    <div class="form-group">
                        <label for="jobTitle">Job Title</label>
                        <input type="text" class="form-control" id="jobTitle" name="jobTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company" required>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Experience Modal -->
<div class="modal fade" id="editExperienceModal" tabindex="-1" role="dialog" aria-labelledby="editExperienceModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editExperienceModalLabel">Edit Experience</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editExperienceForm" method="post">
                <div class="modal-body">
                    <!-- Add your form fields for editing experience here -->
                    <div class="form-group">
                        <label for="editJobTitle">Job Title</label>
                        <input type="text" class="form-control" id="editJobTitle" name="jobTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="editCompany">Company</label>
                        <input type="text" class="form-control" id="editCompany" name="company" required>
                    </div>
                    <div class="form-group">
                        <label for="editStartDate">Start Date</label>
                        <input type="date" class="form-control" id="editStartDate" name="startDate" required>
                    </div>
                    <div class="form-group">
                        <label for="editEndDate">End Date</label>
                        <input type="date" class="form-control" id="editEndDate" name="endDate">
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Description</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="4"></textarea>
                    </div>
                    <!-- Hidden input field for experience_id -->
                    <input type="hidden" id="editExperienceId" name="experience_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ~~~~~~~~~~~~~~~~~~~ EDUCATION Modal ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- Add Education Modal -->
<div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog" aria-labelledby="addEducationModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addEducationModalLabel">Add Education</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addEducationForm" method="post">
                <div class="modal-body">
                    <!-- Add your form fields for adding education here -->
                    <div class="form-group">
                        <label for="degree">Degree</label>
                        <input type="text" class="form-control" id="degree" name="degree" required>
                    </div>
                    <div class="form-group">
                        <label for="institution">Institution</label>
                        <input type="text" class="form-control" id="institution" name="institution" required>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Education Modal -->
<div class="modal fade" id="editEducationModal" tabindex="-1" role="dialog" aria-labelledby="editEducationModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editEducationModalLabel">Edit Education</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editEducationForm" method="post">
                <div class="modal-body">
                    <!-- Add your form fields for editing education here -->
                    <div class="form-group">
                        <label for="editDegree">Degree</label>
                        <input type="text" class="form-control" id="editDegree" name="degree" required>
                    </div>
                    <div class="form-group">
                        <label for="editInstitution">Institution</label>
                        <input type="text" class="form-control" id="editInstitution" name="institution" required>
                    </div>
                    <div class="form-group">
                        <label for="editStartDate">Start Date</label>
                        <input type="date" class="form-control" id="editStartDate" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="editEndDate">End Date</label>
                        <input type="date" class="form-control" id="editEndDate" name="end_date">
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Description</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="4"></textarea>
                    </div>
                    <!-- Hidden input field for education_id -->
                    <input type="hidden" id="editEducationId" name="education_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ~~~~~~~~~~~~~~~~~~~ SKills Modal ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<!-- Add Skill Modal -->
<div class="modal fade modal-info" id="addSkillModal" tabindex="-1" role="dialog" aria-labelledby="addSkillModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addSkillModalLabel">Add Skill</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addSkillForm" method="post">
                <div class="modal-body">
                    <!-- Add your form fields for adding skill here -->
                    <div class="form-group">
                        <label for="skill_name">Skill Name</label>
                        <input type="text" class="form-control" id="skill_name" name="skill_name" required>
                    </div>
                    <div class="form-group">
                        <label for="addProficiencyLevel">Proficiency Level</label>
                            <select class="form-control" id="addProficiencyLevel" name="proficiency_level">
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                                <option value="Master">Master</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description (optional)</label>
                        <textarea class="form-control" id="skill_description" name="skill_description" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Update Skill Modal -->
<div class="modal fade" id="editSkillModal" tabindex="-1" role="dialog" aria-labelledby="editSkillModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editSkillModalLabel">Edit Skill</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editSkillForm" method="post">
                <div class="modal-body">
                    <!-- Add your form fields for editing skill here -->
                    <div class="form-group">
                        <label for="editSkillName">Skill Name</label>
                        <input type="text" class="form-control" id="editSkillName" name="skill_name" required>
                    </div>
                    <div class="form-group">
                        <!-- Display proficiency level name and value -->
                        <label for="currentProficiencyLabel">Proficiency is <span id="currentProficiencyLabel">Level <span id="currentProficiencyValue">0</span>%</span></label>
                        <input type="number" class="form-control" id="editProficiencyValue" name="proficiency_value" min="0" max="100">
                    </div>
                    <div class="form-group">
                        <label for="editSkillDescription">Description (optional)</label>
                        <textarea class="form-control" id="editSkillDescription" name="skill_description" rows="4"></textarea>
                    </div>
                    <!-- Hidden input fields for skill_id and current proficiency level -->
                    <input type="hidden" id="editSkillId" name="skill_id">
                    <input type="hidden" id="editCurrentProficiencyLevel" name="current_proficiency_level">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ~~~~~~~~~~~~~~~~~~~ Services Modal ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addServiceModalLabel">Add Service</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addServiceForm" method="post">
                <div class="modal-body">
                    <!-- Add your form fields for adding service here -->
                    <div class="form-group">
                        <label for="serviceName">Service Name</label>
                        <input type="text" class="form-control" id="serviceName" name="serviceName" required>
                    </div>
                    <div class="form-group">
                        <label for="serviceDescription">Description</label>
                        <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="4"></textarea>
                    </div>

                       
                        <div class="form-group">
                            <label for="iconPreview">Icon Preview</label>
                            <p class="text-muted">Insert the name of the icon to preview the icon that you want to add.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Icon Input Field -->
                                    <input type="text" class="form-control" id="serviceIconName" name="serviceIconName">
                                </div>
                                <div class="col-md-6">
                                    <!-- Icon Preview -->
                                    <div id="iconPreview"></div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editServiceModalLabel">Edit Service</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editServiceForm" method="post">
                <div class="modal-body">
                    <!-- Add your form fields for editing service here -->
                    <div class="form-group">
                        <label for="editServiceName">Service Name</label>
                        <input type="text" class="form-control" id="editServiceName" name="serviceName" required>
                    </div>
                    <div class="form-group">
                        <label for="editServiceDescription">Description</label>
                        <textarea class="form-control" id="editServiceDescription" name="serviceDescription" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editServiceIcon">Icon</label>
                        <input type="text" class="form-control" id="serviceIconName" name="serviceIcon">
                    </div>
                    <!-- Hidden input field for service_id -->
                    <input type="hidden" id="editServiceId" name="service_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ~~~~~~~~~~~~~~~~~~~ Project Modal ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- Update Project Modal -->
<div class="modal fade" id="updateProjectModal" tabindex="-1" role="dialog" aria-labelledby="updateProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProjectModalLabel">Update Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateProjectForm" enctype="multipart/form-data">
                    <!-- Hidden input to store project_id -->
                    <input type="hidden" id="updateProjectId" name="project_id" value="">
                    <div class="form-group">
                        <label for="updateTitle">Title</label>
                        <input type="text" class="form-control" id="updateTitle" name="title" placeholder="Project Title">
                    </div>
                    <div class="form-group">
                        <label for="updateDescription">Description</label>
                        <textarea class="form-control" id="updateDescription" name="description" placeholder="Project Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="updateSkillsUsed">Skills Used (comma-separated)</label>
                        <input type="text" class="form-control" id="updateSkillsUsed" name="skills_used" placeholder="e.g., HTML, CSS, JavaScript">
                    </div>
                    <div class="form-group">
                        <label for="updateCategory">Category</label>
                        <select class="form-control" id="updateCategory" name="category">
                            <option value="Brand">Brand</option>
                            <option value="Design">Design</option>
                            <option value="Photos">Photos</option>
                            <option value="Website">Website</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="updateProjectUrl">Project URL</label>
                        <input type="text" class="form-control" id="updateProjectUrl" name="project_url" placeholder="Project URL">
                    </div>
                    <div class="form-group">
                        <label for="updateImage">Image</label>
                        <input type="file" class="form-control-file" id="updateImage" name="image">
                        <small class="form-text text-muted">
                            Upload an image (allowed types: jpg, jpeg, png). Max file size: 1MB.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="updateImageModal">Image Modal</label>
                        <input type="file" class="form-control-file" id="updateImageModal" name="image_modal">
                        <small class="form-text text-muted">
                            Upload an image modal (allowed types: jpg, jpeg, png). Max file size: 1MB.
                        </small>
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="updateProjectButton">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
